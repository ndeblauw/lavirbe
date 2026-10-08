<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\DetectsHoneypotSpam;
use App\Http\Requests\DrukwerkContactRequest;
use App\Models\Contact;
use App\Notifications\NewContactSubmission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;
use Spatie\Honeypot\SpamProtection;

class DrukwerkContactController extends Controller
{
    use DetectsHoneypotSpam;

    /**
     * @var list<string>
     */
    public const PRODUCTS = [
        'Autostickers',
        'Baby slabbetjes',
        'Babyrompers',
        'Badtextiel',
        'Ballonnen',
        'Bestekzakjes',
        'Bidons',
        'Bierviltjes',
        'Boeken',
        'Hekdoeken',
        'Borden',
        'Borrelplanken',
        'Brievenbusdozen',
        'Brochures',
        'Buttons',
        'Cadeaupapier',
        'Cadeauzakjes',
        'Consumptiebonnen',
        'Deurhangers',
        'Dibond',
        'Drinkflessen',
        'Enveloppen',
        'Fleece dekens',
        'Flessenopeners',
        'Flyers',
        'Folders',
        'Forex',
        'Fototegels',
        'Frisbees',
        'Gevelbanieren',
        'Gevelvlaggen',
        'Handdoeken',
        'Hekwerkbanners',
        'Herbruikbare bekers',
        'Kalenders',
        'Katoenen tassen',
        'Kranten',
        'Linten',
        'Magazines',
        'Magneetfolie',
        'Mastvlaggen',
        'Memoblokken',
        'Menukaarten',
        'Mokken',
        'Notitieblokken',
        'Papieren bekers',
        'Papieren tassen',
        "Paraplu's",
        'Pennen',
        'Plaatmateriaal',
        'Placemats',
        'Plexiglas',
        'Posters',
        'Presentatiemappen',
        'PVC pasjes',
        'Raamstickers',
        'Roll-up banners',
        'Satijnen zakjes',
        'Spandoeken',
        'Spelkaarten',
        'Stickers',
        'Stoepborden',
        'Strandballen',
        'Strandstoelen',
        'Textieldoeken',
        'Tote bags',
        'Truien',
        'T-shirts',
        'Visitekaartjes',
        'Vlaggenlijnen',
        'Vloermatten',
        'Vloerstickers',
        'Wijndozen',
        'Zonnebrillen',
        'andere',
    ];

    public function create(): View
    {
        return view('drukwerk.contact', [
            'products' => self::PRODUCTS,
        ]);
    }

    public function store(DrukwerkContactRequest $request, SpamProtection $spamProtection): RedirectResponse
    {
        $isSpam = $this->isSpam($request, $spamProtection);

        $contact = Contact::create([
            ...$request->validated(),
            'type' => Contact::TYPE_DRUKWERK,
            'is_spam' => $isSpam,
            'spam_reason' => $isSpam ? 'honeypot' : null,
        ]);

        if (! $isSpam) {
            Notification::route('mail', 'info@lavir.be')
                ->notify(new NewContactSubmission($contact));
        }

        return redirect()->back()->with('success', 'Bedankt! Je offerteaanvraag is verstuurd. We bezorgen je zo snel mogelijk een voorstel.');
    }
}
