@extends('layouts.front')


@section('content')

	<!-- Page header -->
	<div class="page-top-section">
		<div class="overlay"></div>
		<div class="container text-right">
			<div class="page-info">
				<h2>Blog</h2>
				<div class="page-links">
					<a href="#">Home</a>
					<span>Blog</span>
				</div>
			</div>
		</div>
	</div>
	<!-- Page header end-->


    	<!-- page section -->
	<div class="page-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-7 blog-posts">
                        @forelse ($arts as $art)
                            <div class="post-item">
                                <div class="post-thumbnail">
                                    <img src="{{ asset($art->image) }}" alt="{{$art->titre}}">
                                    <div class="post-date">
                                        <h2>{{ $art->created_at->format('d') }} </h2>
                                        <h3>{{ $art->created_at->format('M') . " " . $art->created_at->format('Y') }}</h3>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title">{{$art->titre}}</h2>
                                    <div class="post-meta">
                                        <a href="">{{ $art->categorie->nom }}</a>
                                        <a href="">Tags associés: {{ count($art->tags) }}</a>
                                        <a href="">{{count($art->comments)}} Comments</a>
                                    </div>
                                    <p>{{ Str::limit($art->description, 200, '...') }}</p>
                                    <a href="blog-post.html" class="read-more">Read More</a>
                                </div>
                            </div> 
                        @empty
                            <p>Rien à afficher ici .. (Pas darticles)</p>
                        @endforelse

					<!-- Pagination -->
                
                    <div class="page-pagination">
                        {{ $arts->links('vendor/pagination/default') }}
					</div>
				</div>
				<!-- Sidebar area -->
				<div class="col-md-4 col-sm-5 sidebar" style="position:sticky; top:50px;">
					<!-- Single widget -->
					<div class="widget-item">
						<form action="#" class="search-form">
							<input type="text" placeholder="Search">
							<button class="search-btn"><i class="flaticon-026-search"></i></button>
						</form>
					</div>
					<!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Categories</h2>
						<ul>
                            {{-- Recherche par categorie  --}}
                            @forelse ($cats as $cat)
                                <li><a href="#">{{ $cat->nom }}</a></li>
                                @if ($loop->iteration >= 7) 
                                    @break
                                @endif
                            @empty
                                <p>Pas de categories...</p>
                            @endforelse
						</ul>
					</div>
					<!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Tags</h2>
						<ul class="tag">
							{{-- Recherche par tag  --}}
                            @forelse ($tags as $tag)
                                <li><a href="#">{{ $tag->nom }}</a></li>
                                @if ($loop->iteration >= 7) 
                                    @break
                                @endif
                            @empty
                                <p>Pas de tags...</p>
                            @endforelse
						</ul>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- page section end-->

    @include('components.front.newsletter')
    
    {!! $footer !!}
@endsection
