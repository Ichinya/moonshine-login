<?php

namespace Ichinya\MoonshineLogin\Controllers;

use App\Http\Controllers\Controller;
use Ichinya\MoonshineLogin\Requests\ProfileFormRequest;
use App\Models\User;
use Ichinya\MoonshineLogin\Pages\ProfilePage;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;

final class ProfileController extends Controller
{
    public function index(
        ProfilePage $page
    ): ProfilePage {
        return $page;
    }

    public function update(
        ProfileFormRequest $request,
        #[CurrentUser] User $user
    ): RedirectResponse {
        $data = $request->only(['email', 'name']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }
        $user->update($data);

        return to_route('profile');
    }
}
