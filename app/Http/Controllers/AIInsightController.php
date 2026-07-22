<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class AIInsightController extends Controller
{
    public function generateInsight()
    {
        try {
            // Database Metrics
            $totalGstBills = DB::table('gst_bills')->count();
            $totalVendorInvoices = DB::table('vendor_invoices')->count();
            $totalParties = DB::table('parties')->count();

            // AI Prompt Construction
            $prompt = "You are a smart financial advisor for a GST Billing app. " .
                      "Analyze this business data and provide 3 short, actionable bullet points in simple language for the business owner: " .
                      "- Total GST Sales Bills Created: {$totalGstBills} " .
                      "- Total Vendor Purchase Invoices: {$totalVendorInvoices} " .
                      "- Total Registered Parties/Clients: {$totalParties}. " .
                      "If the counts are 0, encourage the owner to start adding clients, sales bills, and vendor invoices.";

            $apiKey = env('GROQ_API_KEY');

            if (!$apiKey) {
                return response()->json(['success' => false, 'message' => '.env file mein GROQ_API_KEY missing hai!'], 500);
            }

            // High-Speed Groq API Call with Llama 3.1
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => 'llama-3.1-8b-instant',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt]
                ],
                'temperature' => 0.7
            ]);

            if ($response->successful()) {
                $aiResult = $response->json()['choices'][0]['message']['content'] ?? 'Insights generate nahi ho paye.';
                return response()->json(['success' => true, 'insight' => $aiResult]);
            }

            return response()->json(['success' => false, 'message' => 'API Error: ' . $response->body()], 500);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}