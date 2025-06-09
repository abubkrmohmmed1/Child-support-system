namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function update(Request $request)
    {
        // Validate and save settings
        $validatedData = $request->validate([
            'default_language' => 'required|string|in:ar,en',
            // Other validations...
        ]);

        // Store the selected language in the session
        session(['locale' => $validatedData['default_language']]);

        // Optionally, save other settings...

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }
}