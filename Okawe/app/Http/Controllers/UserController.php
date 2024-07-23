<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $exists = User::where('email', $email)->exists();
        
        return Response::json(['exists' => $exists]);
    }

    public function updateTheme(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            try {
                $theme = $request->input('theme');
                Log::info('Thème reçu:', ['theme' => $theme]);
                $user->theme = $theme;
                $user->save();
                Log::info('Thème mis à jour pour l\'utilisateur:', ['user_id' => $user->id, 'theme' => $user->theme]);
                return response()->json(['status' => 'success', 'message' => 'Thème mis à jour']);
            } catch (\Exception $e) {
                Log::error('Erreur lors de la mise à jour du thème:', ['error' => $e->getMessage()]);
                return response()->json(['status' => 'error', 'message' => 'Erreur lors de la mise à jour du thème']);
            }
        } else {
            Log::error('Utilisateur non authentifié');
            return response()->json(['status' => 'error', 'message' => 'Utilisateur non authentifié']);
        }
    }

    public function getTheme()
    {
        $user = Auth::user();
        if ($user) {
            $theme = $user->theme ?? 'light-mode';
            return response()->json(['theme' => $theme]);
        } else {
            return response()->json(['theme' => 'light-mode']);
        }
    }

}
