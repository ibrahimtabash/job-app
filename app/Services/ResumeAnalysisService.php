<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;
use Spatie\PdfToText\Pdf;

class ResumeAnalysisService
{
    public function extractResumeInformation(string $fileUrl): array
    {
        try {
            // Extract raw text from the resume pdf file (read pdf file, and get the text)
            $rawText = $this->extractTextFromPdf($fileUrl);

            Log::debug('Successfully extracted text from pdf file' . strlen($rawText) . 'characters');

            // Use OpenAI API to organize the text into a structured format
            $response = OpenAI::chat()->create([
                'model' => 'gpt-4o',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a percise resume parser. Extract information exactly as it appears in the resume without adding any interpretation or additional information. The output should be in JSON format.'
                    ],
                    [
                        'role' => 'user',
                        'content' => "Parse the following resume content and extract the information as a JSON Object with the exact keys: 'summary', 'skills', 'experience', 'education'. The resume content is: {$rawText}. Return an empty string for key that if not found."
                    ],
                ],
                'response_format' => [
                    'type' => 'json_object'
                ],
                'temperature' => 0.1  // Sets the randomness of the AI response to 0, making it deterministic and focused on the most likely completion
            ]);
            //  Output : summary, skills, experience, education -> JSON
            $result = $response->choices[0]->message->content;
            Log::debug('OpenAI response' . $result);

            $parsedResult = json_decode($result, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::error('Failed to parse OpenAI response' . json_last_error_msg());
                throw new \Exception('Failed to parse OpenAI response');
            }

            // Validate the parsed result
            $requiredKeys = ['summary', 'skills', 'experience', 'education'];
            $missingKeys = array_diff($requiredKeys, array_keys($parsedResult));

            if (count($missingKeys) > 0) {
                Log::error('Missing required keys in the parsed result');
                throw new \Exception('Missing required keys in the parsed result');
            }

            //  Return the JSON object
            return [
                'summary' => $parsedResult['summary'] ?? '',
                'skills' => $parsedResult['skills'] ?? '',
                'experience' => $parsedResult['experience'] ?? '',
                'education' => $parsedResult['education'] ?? ''
            ];
        } catch (\Exception $e) {
            Log::error("Error extracting resume information" . $e->getMessage());
            return [
                'summary' => '',
                'skills' => '',
                'experience' => '',
                'education' => ''
            ];
        }
    }

    // lec15
    public function analyzeResume($jobVacancy, $resumeData): array
    {
        try {
            $jobDetails = json_encode([
                'job_title' => $jobVacancy->title,
                'job_description' => $jobVacancy->description,
                'job_location' => $jobVacancy->location,
                'job_type' => $jobVacancy->type,
                'job_salary' => $jobVacancy->salary,
            ]);

            $resumeDetails = json_encode($resumeData);

            $response = OpenAI::chat()->create([
                'model' => 'gpt-4o',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are an expert HR professional and job recruiter. Your task is to evaluate the compatibility between a job vacancy and a candidate\'s resume. Provide a score from 0 to 100 and detailed feedback. You must respond ONLY with a valid JSON object containing exactly these keys: "aiGeneratedScore" (integer 0-100) and "aiGeneratedFeedback" (string with detailed analysis). Do not include any other text or explanation in your response.'
                    ],
                    [
                        'role' => 'user',
                        'content' => "Please evaluate this job application. \n\nJOB DETAILS:\n{$jobDetails}\n\nCANDIDATE RESUME:\n{$resumeDetails}"
                    ]
                ],
                'response_format' => [
                    'type' => 'json_object'
                ],
                'temperature' => 0.1
            ]);

            $result = $response->choices[0]->message->content;
            Log::debug('OpenAI evaluationresponse: ' . $result);

            $parsedResult = json_decode($result, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::error('Failed to parse OpenAI response: ' . json_last_error_msg());
                throw new \Exception('Failed to parse OpenAI response');
            }

            if (!isset($parsedResult['aiGeneratedScore']) || !isset($parsedResult['aiGeneratedFeedback'])) {
                Log::error('Missing required keys in the parsed result');
            }

            return $parsedResult;
        } catch (\Exception $e) {
            Log::error('Error analyzing resume: ' . $e->getMessage());
            return [
                'aiGeneratedScore' => 0,
                'aiGeneratedFeedback' => 'An error occurred while analyzing the resume. Please try later.'
            ];
        }
    }

    private function extractTextFromPdf(string $fileUrl): string
    {
        // Reading the file from the cloud to local disk storage in temp file
        $tempFile = tempnam(sys_get_temp_dir(), 'resume');

        $filePath = parse_url($fileUrl, PHP_URL_PATH);
        if (!$filePath) {
            throw new \Exception('Invaild file URL');
        }

        $filename = basename($filePath);

        // $storagePath = "resumes/{$filename}";
        // // dd($storagePath);
        // if (!Storage::disk('cloud')->exists($storagePath)) {
        //     throw new \Exception('File not found');
        // }

        // $pdfContent = Storage::disk('cloud')->get($storagePath);
        // if (!$pdfContent) {
        //     throw new \Exception('Faild to read file');
        // }
        $storagePath = "resumes/{$filename}";

        try {
            $pdfContent = Storage::disk('cloud')->get($storagePath);
        } catch (\Throwable $e) {
            throw new \Exception("File not found or cannot be read: {$storagePath}");
        }

        if (!$pdfContent) {
            throw new \Exception('Failed to read file');
        }

        file_put_contents($tempFile, $pdfContent);

        // Check if pdf-to-text is installed
        $pdfToTextPath = ['/opt/homebrew/bin/pdftotext', '/usr/bin/pdftotext', '/usr/local/bin/pdftotext'];
        $pdfToTextAvailable = false;

        foreach ($pdfToTextPath as $path) {
            if (file_exists($path)) {
                $pdfToTextAvailable = true;
                break;
            }
        }

        if (!$pdfToTextAvailable) {
            throw new \Exception('pdf-to-text is not installed');
        }

        // Extract text from the pdf file
        $instance = new Pdf();
        $instance->setPdf($tempFile);
        $text = $instance->text();

        // Clean up the temp file
        unlink($tempFile);

        return $text;
    }
}
