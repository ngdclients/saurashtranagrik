@extends('layouts.app')

@section('title', 'Managers | Shree Saurashtra Nagrik Sharafi Mandali Ltd.')
@section('meta', 'Head office and branch managers of Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd.')

@section('content')
    <div class="page-head">
        <div class="wrap">
            <p class="crumb"><a href="{{ route('home') }}">Home</a> &rsaquo; Managers</p>
            <h1>Managers</h1>
            <p>The people running our head office and branches day to day.</p>
        </div>
    </div>

    @if ($headOfficeManagers->isNotEmpty())
        <section class="section section--tight">
            <div class="wrap">
                <div class="section-head reveal">
                    <span class="eyebrow">Head Office</span>
                    <h2>Head Office Managers</h2>
                </div>
                <div class="lead-grid reveal-group">
                    @foreach ($headOfficeManagers as $manager)
                        <article class="lead-card" style="--accent: var(--{{ $manager->color_class }})">
                            <span class="lead-card__role">{{ $manager->designation }}</span>
                            <h2 class="lead-card__name">{{ $manager->name }}</h2>
                            @if ($manager->phone)
                                <a class="lead-card__call" href="tel:{{ preg_replace('/\D+/', '', $manager->phone) }}" target="_blank" rel="noopener">
                                    @include('partials.icon', ['name' => 'phone'])
                                    {{ $manager->phone }}
                                </a>
                            @endif
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($branchManagers->isNotEmpty())
        <section class="section section--tight section--subtle">
            <div class="wrap">
                <div class="section-head reveal">
                    <span class="eyebrow">Branches</span>
                    <h2>Branch Managers</h2>
                </div>
                <div class="lead-grid reveal-group">
                    @foreach ($branchManagers as $manager)
                        <article class="lead-card" style="--accent: var(--{{ $manager->color_class }})">
                            <span class="lead-card__role">{{ $manager->designation }}</span>
                            <h2 class="lead-card__name">{{ $manager->name }}</h2>
                            @if ($manager->phone)
                                <a class="lead-card__call" href="tel:{{ preg_replace('/\D+/', '', $manager->phone) }}" target="_blank" rel="noopener">
                                    @include('partials.icon', ['name' => 'phone'])
                                    {{ $manager->phone }}
                                </a>
                            @endif
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
