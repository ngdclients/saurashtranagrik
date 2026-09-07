@extends('layouts.app')

@section('title', 'Bagasara Head Office | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'Bagasara Head Office of Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd. - Board of Directors, address and contact details.')

@php
    // Directors split by sort_order position (as set in admin panel):
    // 1st  → Chairman   (centred hero row)
    // 2–4  → Vice Chairman / M.D. / Mantri  (3-col row)
    // 5+   → any additional directors
    $dirChairman = $directors->first();
    $dirTier2 = $directors->slice(1, 3)->values();
    $dirRest = $directors->slice(4)->values();
@endphp

@section('content')
    <div class="signboard-hero">
        <div class="wrap">
            <p class="crumb crumb--on-brand">
                <a href="{{ route('home') }}">Home</a> &rsaquo;
                <a href="{{ route('branches') }}">Branches</a> &rsaquo;
                Bagasara Head Office
            </p>
            <h1 class="signboard-hero__title">Bagasara Head Office</h1>

            <div class="signboard-hero__contacts">
                <span class="signboard-hero__addr">
                    @include('partials.icon', ['name' => 'pin'])
                    Samarth Saurashtra Building, Amarpara, Bagasara, Dist. - Amreli
                </span>
                <a href="tel:02796220525" target="_blank" rel="noopener">
                    @include('partials.icon', ['name' => 'phone'])
                    (02796) 220 525
                </a>
                <a href="tel:9484529400" target="_blank" rel="noopener">
                    @include('partials.icon', ['name' => 'mobile'])
                    94845 29400
                </a>
            </div>
        </div>
    </div>

    {{-- Board of Directors --}}
    <section class="section section--tight"
        style="background:linear-gradient(155deg,color-mix(in srgb,var(--brand) 4%,var(--surface)),color-mix(in srgb,var(--gold) 7%,var(--surface)) 100%)">
        <div class="wrap">

            {{-- Heading --}}
            <div class="section-head reveal" style="text-align:center">
                <h2>Board of Directors</h2>
                <div
                    style="width:48px;height:3px;background:linear-gradient(90deg,var(--brand),var(--gold));border-radius:2px;margin:.4rem auto 0">
                </div>
            </div>

            {{-- Row 1: Chairman – centred, badge floating above --}}
            @if ($dirChairman)
                <div class="reveal" style="display:flex;justify-content:center;margin-bottom:3.5rem">
                    <div style="position:relative;width:300px">
                        <div
                            style="position:absolute;top:-14px;left:50%;transform:translateX(-50%);z-index:2;white-space:nowrap;background:linear-gradient(135deg,var(--brand),var(--gold));color:#fff;font-size:.65rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:5px 20px;border-radius:var(--radius-full);box-shadow:var(--shadow-sm)">
                            ★&nbsp; {{ $dirChairman->designation }}
                        </div>
                        <article class="card card--hover person" style="border-top:3px solid var(--brand)">
                            <div class="person-photo">
                                <img src="{{ asset($dirChairman->photo) }}" alt="{{ $dirChairman->name }}" loading="lazy"
                                    decoding="async">
                            </div>
                            <div class="card-body">
                                <h3>{{ $dirChairman->name }}</h3>
                            </div>
                        </article>
                    </div>
                </div>
            @endif

            {{-- Row 2: Vice Chairman / M.D. / Mantri – floating designation badges --}}
            @if ($dirTier2->isNotEmpty())
                <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:2rem;max-width:780px;margin:0 auto 3.5rem"
                    class="reveal-group">
                    @foreach ($dirTier2 as $d)
                        <div style="position:relative">
                            <div
                                style="position:absolute;top:-12px;left:50%;transform:translateX(-50%);z-index:2;white-space:nowrap;background:var(--brand-soft);color:var(--brand);font-size:.62rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:4px 14px;border-radius:var(--radius-full);border:1.5px solid var(--brand)">
                                {{ $d->designation }}
                            </div>
                            <article class="card card--hover person" style="border-top:2px solid var(--brand)">
                                <div class="person-photo">
                                    <img src="{{ asset($d->photo) }}" alt="{{ $d->name }}" loading="lazy" decoding="async">
                                </div>
                                <div class="card-body">
                                    <h3>{{ $d->name }}</h3>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Row 3: any extra directors (5th+) --}}
            @if ($dirRest->isNotEmpty())
                <div class="grid-cards-center reveal-group">
                    @foreach ($dirRest as $d)
                        <article class="card card--hover person">
                            <div class="person-photo">
                                <img src="{{ asset($d->photo) }}" alt="{{ $d->name }}" loading="lazy" decoding="async">
                            </div>
                            <div class="card-body">
                                <h3>{{ $d->name }}</h3>
                                <span class="role">{{ $d->designation }}</span>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- Management team --}}
    <section class="section section--tight" style="background:#f4f1ee">
        <div class="wrap">
            <div class="section-head reveal">
                <h2>Head Office Staff</h2>
            </div>
            <div class="lead-grid reveal-group">
                @foreach ([
                        ['General Manager', 'Shri Jaydip Sinh Rathod'],
                        ['Financial Manager', 'Shri Chiragbhai Kanpariya'],
                        ['Development Manager', 'Shri Alpeshbhai Sathwara'],
                        ['Account Manager', 'Shri Ajaybhai Nakum'],
                    ] as $i => [$role, $name])
                    <article class="lead-card" style="--accent: var(--c{{ ($i % 6) + 1 }})">
                        <span class="lead-card__role">{{ $role }}</span>
                        <h3 class="lead-card__name">{{ $name }}</h3>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Last 5 years growth --}}
    <section class="section section--tight section--subtle">
        <div class="wrap">
            <div class="section-head reveal">
                <h2
                    style="display:inline-block;background:var(--brand);color:#fff;padding:10px 28px;border-radius:6px;letter-spacing:.01em">
                    છેલ્લા ૫ વર્ષની વિકાસની કેડી
                </h2>
            </div>
            <div class="card reveal" style="overflow-x:auto">
                <div class="card-body" style="padding:0">
                    <table
                        style="width:100%;border-collapse:collapse;min-width:600px;font-family:inherit;border:1px solid #000">
                        <thead>
                            <tr style="background:var(--brand);color:#fff">
                                <th
                                    style="padding:12px 14px;text-align:center;font-weight:600;white-space:nowrap;border-right:1px solid #000">
                                    વર્ષ</th>
                                <th
                                    style="padding:12px 14px;text-align:right;font-weight:600;white-space:nowrap;border-right:1px solid #000">
                                    સભ્ય સંખ્યા</th>
                                <th
                                    style="padding:12px 14px;text-align:right;font-weight:600;white-space:nowrap;border-right:1px solid #000">
                                    શેર ભંડોળ</th>
                                <th
                                    style="padding:12px 14px;text-align:right;font-weight:600;white-space:nowrap;border-right:1px solid #000">
                                    થાપણ</th>
                                <th
                                    style="padding:12px 14px;text-align:right;font-weight:600;white-space:nowrap;border-right:1px solid #000">
                                    ધિરાણ</th>
                                <th
                                    style="padding:12px 14px;text-align:right;font-weight:600;white-space:nowrap;border-right:1px solid #000">
                                    નફો</th>
                                <th style="padding:12px 14px;text-align:center;font-weight:600;white-space:nowrap">ઓડિટ વર્ગ
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ([
                                    ['૨૧-૨૨', '૫૭૦૧', '૧,૫૦,૪૯,૯૦૦.૦૦', '૪૩,૯૮,૬૦,૬૫૯.૦૦', '૩૨,૦૪,૩૩,૯૮૯.૦૦', '૯૩,૪૮,૬૯૨.૨૧', 'અ'],
                                    ['૨૨-૨૩', '૭૫૭૮', '૨,૦૮,૫૫,૦૦૦.૦૦', '૪૫,૪૯,૯૮,૪૫૯.૦૦', '૪૧,૩૩,૮૮,૨૯૬.૦૦', '૮૨,૮૬,૪૮૦.૫૨', 'અ'],
                                    ['૨૩-૨૪', '૧૦૦૦૮', '૨,૯૯,૯૦,૩૦૦.૦૦', '૬૮,૬૩,૧૪,૩૪૯.૬૦', '૭૩,૫૫,૪૫,૮૨૫.૦૦', '૧,૯૮,૯૭,૪૫૯.૩૯', 'અ'],
                                    ['૨૪-૨૫', '૧૧,૮૯૦', '૩,૨૫,૭૦,૮૦૦.૦૦', '૬૩,૬૩,૯૪,૪૯૦.૬૦', '૧,૦૦,૩૦,૦૯,૦૮૪.૦૦', '૧,૨૩,૦૩,૩૬૮.૩૩', 'અ'],
                                    ['૨૫-૨૬', '૧૩૫૫૨', '૩,૯૩,૯૮,૫૦૦.૦૦', '૧,૧૯,૮૫,૦૯,૩૬૦.૬૦', '૧,૪૮,૩૩,૦૪,૯૨૨.૦૦', '૨,૧૧,૯૮,૫૨૫.૮૨', '-'],
                                ] as $i => $row)
                                @php $bb = $loop->last ? '' : 'border-bottom:1px solid #000;'; @endphp
                                <tr
                                    style="{{ $i % 2 === 0 ? 'background:var(--surface)' : 'background:var(--surface-alt,var(--surface))' }}">
                                    <td
                                        style="padding:11px 14px;text-align:center;font-weight:600;{{ $bb }}border-right:1px solid #000">
                                        {{ $row[0] }}</td>
                                    <td style="padding:11px 14px;text-align:right;{{ $bb }}border-right:1px solid #000">
                                        {{ $row[1] }}</td>
                                    <td style="padding:11px 14px;text-align:right;{{ $bb }}border-right:1px solid #000">
                                        {{ $row[2] }}</td>
                                    <td style="padding:11px 14px;text-align:right;{{ $bb }}border-right:1px solid #000">
                                        {{ $row[3] }}</td>
                                    <td style="padding:11px 14px;text-align:right;{{ $bb }}border-right:1px solid #000">
                                        {{ $row[4] }}</td>
                                    <td style="padding:11px 14px;text-align:right;{{ $bb }}border-right:1px solid #000">
                                        {{ $row[5] }}</td>
                                    <td style="padding:11px 14px;text-align:center;{{ $bb }}">{{ $row[6] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection