<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\CakeOrderRequest;
use App\Http\Requests\Site\ContactRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Receives the public cake-order and contact forms.
 *
 * Validation is complete; persistence and staff notification are the
 * integration point for the backend (e.g. a CakeOrder model plus a mail or
 * SMS notification to the chosen branch).
 */
class EnquiryController extends Controller
{
    public function cakeOrder(CakeOrderRequest $request): JsonResponse|RedirectResponse
    {
        Log::info('KOBA cake order request', $request->validated());

        return $this->respond($request, __('koba.order.success_body'));
    }

    public function contact(ContactRequest $request): JsonResponse|RedirectResponse
    {
        Log::info('KOBA contact message', $request->validated());

        return $this->respond($request, __('koba.contact.success_body'));
    }

    private function respond(Request $request, string $message): JsonResponse|RedirectResponse
    {
        if ($request->expectsJson()) {
            return response()->json(['ok' => true, 'message' => $message]);
        }

        return back()->with('status', $message);
    }
}
