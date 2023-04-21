<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use App\Models\FAQ;
use Illuminate\Http\Request;

class BotController extends Controller
{
    public function chat(Request $request)
    {
        $query = strtolower($request->input('question'));
        $name = '';
        $action = '';

        $namePattern = '/my name is (\w+)/i';
        preg_match($namePattern, $query, $nameMatch);

        $actionPattern = '/I (want|would like) to (\w+)/i';
        preg_match($actionPattern, $query, $actionMatch);

        if (isset($nameMatch[1])) {
            $name = $nameMatch[1];
        }

        if (isset($actionMatch[2])) {
            $action = $actionMatch[2];
        }

        if ($name && $action) {
            $answer = "Hello $name, sure, we can help you with $action. Please provide more details about what you want to do.
            Or better still drop your email and name, so one of our representative to get to you.";
            return response()->json(['data' => $answer, 'message' => 'Answer retrieved successfully.'], 200);
        } elseif ($name) {
            $answer = "Hello $name, how can I help you today?";
            return response()->json(['data' => $answer, 'message' => 'Answer retrieved successfully.'], 200);
        } else {
            if ($query == "hi" || $query == "good day" || $query == "gooday" || $query == "hello" || $query == "xup" || $query == "hey") {
                $answer = "Hello, how can I help you?";
                return response()->json(['data' => $answer, 'message' => 'Answer retrieved successfully.'], 200);
            } else {
                if (!empty($query)) {
                    $faq = FAQ::where('question', 'LIKE', '%' . $query . '%')->first();

                    if ($faq) {
                        $answer = $faq->answer;
                        return response()->json(['data' => $answer, 'message' => 'Answer retrieved successfully.'], 200);
                    } else {
                        $answer = "I'm sorry, I don't know the answer to that question. Please try again with a different question.
                        Or better still drop your email and name, so one of our representative to get to you.";
                        return response()->json(['data' => $answer, 'message' => 'Answer retrieved successfully.'], 200);
                    }
                } else {
                    $answer = "I'm sorry, I didn't catch that. Can you please ask me a question?";
                    return response()->json(['data' => $answer, 'message' => 'Answer retrieved successfully.'], 200);
                }
            }
        }
    }

//    public function chat(Request $request)
//    {
//        $query = strtolower($request->input('question'));
//        $name = '';
//
//        $pattern = '/my name is (\w+)/i';
//        preg_match($pattern, $query, $nameMatches);
//
//        $pattern = '/I (want|would like) to (\w+)/i';
//        preg_match($pattern, $query, $actionMatches);
//
//        if ($nameMatches && isset($nameMatches[1])) {
//            $name = $nameMatches[1];
//        }
//
//        if ($actionMatches && isset($actionMatches[2])) {
//            $action = $actionMatches[2];
//        }
//
//        if (isset($name) && isset($action)) {
//            $answer = "Hello $name, sure, we can help you with $action. Please provide more details about what you want to do.";
//            return response()->json(['data' => $answer, 'message' => 'answered retrieved successfully'], 200);
//        } elseif (isset($name)) {
//            $answer = "Hello $name, how can I help you today?";
//            return response()->json(['data' => $answer, 'message' => 'answered retrieved successfully'], 200);
//        } else {
//
//
//            if ($query == "hi") {
//                $answer = "Hello, how can I help you?";
//            } elseif ($query == "good day" or $query == "gooday") {
//                $answer = "Hello, how can I help you?";
//            } elseif ($query == "hello" or $query == "xup") {
//                $answer = "hi, how can I help you?";
//            } else {
//                if (!empty($query)) {
//                    $faq = FAQ::where('question', 'LIKE', '%' . $query . '%')->first();
//
//                    if ($faq) {
//                        $answer = $faq->answer;
//                    } else {
//                        $answer = "I'm sorry, I don't know the answer to that question. Please leave your email address and full name so I can connect you to one of our representatives.";
//                    }
//                } else {
//                    $answer = "I'm sorry, I didn't catch that. Can you please ask me a question?";
//                }
//            }
//            return $this->getJsonResponse($answer);
//        }
//
//    }

    /**
     * @param string $answer
     * @return \Illuminate\Http\JsonResponse
     */
    public function getJsonResponse(string $answer): \Illuminate\Http\JsonResponse
    {
        return response()->json(['data' => $answer, 'message' => 'Answer retrieved successfully.'], 200);
    }
}
