<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='robots' content='max-image-preview:large'>
    <title>Offerte aanvraag &#8211; LAVIR Drukwerk</title>
    <link rel='stylesheet' href='/css/drukwerk/style.min.css'>
    <link rel='stylesheet' href='/css/drukwerk/style.min-1.css'>
    <link rel='stylesheet' href='/css/drukwerk/styles.css'>
    <link rel='stylesheet' href='/css/drukwerk/style.css'>
    <link rel="icon" href="/img/drukwerk/brand/371164329_1184356959619458_874487311815188223_n-150x150.png" sizes="32x32">
    <style class='wp-fonts-local'>
        @font-face{font-family:Poppins;font-style:normal;font-weight:300;font-display:fallback;src:url('/fonts/drukwerk/Poppins-Light.woff2') format('woff2');font-stretch:normal;}
        @font-face{font-family:Poppins;font-style:normal;font-weight:400;font-display:fallback;src:url('/fonts/drukwerk/Poppins-Regular.woff2') format('woff2');font-stretch:normal;}
        @font-face{font-family:Poppins;font-style:italic;font-weight:400;font-display:fallback;src:url('/fonts/drukwerk/Poppins-Italic.woff2') format('woff2');font-stretch:normal;}
        @font-face{font-family:Poppins;font-style:normal;font-weight:500;font-display:fallback;src:url('/fonts/drukwerk/Poppins-Medium.woff2') format('woff2');font-stretch:normal;}
        @font-face{font-family:Poppins;font-style:normal;font-weight:600;font-display:fallback;src:url('/fonts/drukwerk/Poppins-SemiBold.woff2') format('woff2');font-stretch:normal;}
        @font-face{font-family:Poppins;font-style:normal;font-weight:700;font-display:fallback;src:url('/fonts/drukwerk/Poppins-Bold.woff2') format('woff2');font-stretch:normal;}
        @font-face{font-family:Poppins;font-style:normal;font-weight:800;font-display:fallback;src:url('/fonts/drukwerk/Poppins-ExtraBold.woff2') format('woff2');font-stretch:normal;}
        @font-face{font-family:Poppins;font-style:normal;font-weight:900;font-display:fallback;src:url('/fonts/drukwerk/Poppins-Black.woff2') format('woff2');font-stretch:normal;}
    </style>
    <style>
        .drukwerk-page{font-family:Poppins,sans-serif;background:#0A0C11;color:#abadb3;min-height:100vh;margin:0}
        .drukwerk-page a{color:#fafafa}
        .drukwerk-header{max-width:1100px;margin:0 auto;padding:20px;display:flex;align-items:center;gap:16px}
        .drukwerk-header img{width:50px;height:50px;border-radius:50%}
        .drukwerk-header .site-title{color:#fff;font-size:22px;font-weight:700;margin:0;line-height:1.2}
        .drukwerk-header .site-title a{color:inherit;text-decoration:none}
        .drukwerk-header .tagline{margin:0;color:#abadb3;font-size:12px;font-weight:300}
        .drukwerk-main{max-width:720px;margin:0 auto;padding:24px 20px 64px}
        .drukwerk-main h2{color:#fff;text-align:center;font-weight:600;font-size:2rem;margin:0 0 12px}
        .drukwerk-main p.intro{color:#abadb3;text-align:center;margin:0 0 32px}
        .drukwerk-notice{border-radius:8px;padding:12px 16px;margin:0 0 16px}
        .drukwerk-notice.success{background:#e8f6ee;color:#0f5132}
        .drukwerk-notice.error{background:#fdecea;color:#842029}
        .drukwerk-form{display:flex;flex-direction:column;gap:20px}
        .drukwerk-form label{display:block;color:#fff;font-weight:500;margin-bottom:6px}
        .drukwerk-form input,.drukwerk-form select,.drukwerk-form textarea{width:100%;box-sizing:border-box;background:#141821;color:#fff;border:1px solid #323438;border-radius:8px;padding:12px 14px;font-family:inherit;font-size:16px}
        .drukwerk-form input:focus,.drukwerk-form select:focus,.drukwerk-form textarea:focus{outline:none;border-color:#2292b1}
        .drukwerk-form .field-error{color:#ff6b6b;font-size:14px;margin-top:6px}
        .drukwerk-form button{background:linear-gradient(135deg,#1b3385,#25c5c9);color:#fbfbfb;border:none;border-radius:30px;padding:14px 35px;font-size:16px;font-weight:700;text-transform:capitalize;cursor:pointer;align-self:flex-start}
        .drukwerk-footer{max-width:1100px;margin:0 auto;padding:32px 20px;border-top:1px solid #313131;color:#999;font-size:14px}
        .drukwerk-footer h3{color:#fff;font-size:16px;margin:0 0 12px}
        .drukwerk-footer a{color:#25c5c9}
    </style>
</head>
<body class="drukwerk-page">
    <header class="drukwerk-header">
        <a href="/"><img width="50" height="50" src="/img/drukwerk/brand/371164329_1184356959619458_874487311815188223_n.png" alt="LAVIR Drukwerk"></a>
        <div>
            <p class="site-title"><a href="/">LAVIR Drukwerk</a></p>
            <p class="tagline">Alle drukwerk</p>
        </div>
    </header>

    <main class="drukwerk-main">
        <h2>Offerte aanvraag</h2>
        <p class="intro">
            Vul hieronder het offerteformulier in, en ontvang vrijblijvend een offerte in je mailbox.
            We streven er naar om binnen de 24u een offerte te bezorgen.
        </p>

        @if (session('success'))
            <div class="drukwerk-notice success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('drukwerk.contact.store') }}" method="POST" class="drukwerk-form">
            @csrf
            <x-honeypot />

            <div>
                <label for="name">Jouw naam</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="email">Jouw email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="phone">Jouw telefoonnummer (optioneel)</label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}">
                @error('phone')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="subject">Het product waar je een prijs voor wilt ontvangen</label>
                <select name="subject" id="subject" required>
                    <option value="">Maak een keuze</option>
                    @foreach ($products as $product)
                        <option value="{{ $product }}" @selected(old('subject') === $product)>{{ $product }}</option>
                    @endforeach
                </select>
                @error('subject')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="quantity">Aantal stuks</label>
                <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" min="1" max="50000" required>
                @error('quantity')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="message">
                    Indien je een voorkeur hebt voor bepaalde materialen, drukwijze of afwerking,
                    kan je hier alle details achterlaten. (optioneel)
                </label>
                <textarea name="message" id="message" rows="10" maxlength="5000">{{ old('message') }}</textarea>
                @error('message')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Versturen</button>
        </form>
    </main>

    <footer class="drukwerk-footer">
        <h3>Contact</h3>
        <p>LAVIR DRUKWERK</p>
        <p>LAVIR VOF<br>0793.513.448<br>Bergstraat 59 &#8211; 2950 Kapellen</p>
        <p><a href="https://www.instagram.com/lavir_drukwerk/" target="_blank" rel="noopener">Instagram</a></p>
        <p>Copyright &copy; {{ date('Y') }} <a href="/">LAVIR Drukwerk</a></p>
    </footer>
</body>
</html>
