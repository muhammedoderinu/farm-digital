
<!-- component -->
<!doctype html>
<html lang="id-ID">
<head>
    <title>
        Farm Digital
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	
	
</head>

<body>

<p>{{$old_posts}}</p>
<p>{{$new_posts}}</p>

<section class="px-5 py-10 dark:bg-gray-800 dark:text-gray-100">
	<div class="container grid grid-cols-12 mx-auto gap-y-6 md:gap-10">
		<div class="flex flex-col justify-between col-span-12 py-2 space-y-8 md:space-y-16 md:col-span-3">
			<div class="flex flex-col space-y-8 md:space-y-12">
				@foreach($old_posts as $old_post )
				<div class="flex flex-col space-y-2">
					<h3 class="flex items-center space-x-2 dark:text-gray-400">
						<span class="flex-shrink-0 w-2 h-2 uppercase rounded-full dark:bg-violet-400"></span>
						<span class="text-xs font-bold tracki uppercase">Exclusive</span>
					</h3>
					<a rel="noopener noreferrer" onclick="getContent()" class="font-serif hover:underline">Donec sed elit quis odio mollis dignissim eget et nulla.</a>
					<p class="text-xs dark:text-gray-400">47 minutes ago by
						<a rel="noopener noreferrer" href="#" class="hover:underline dark:text-violet-400">Leroy Jenkins</a>
					</p>
				</div>
				@endforeach
				
			</div>
			<div class="flex flex-col w-full space-y-2">
				<div class="flex w-full h-1 bg-opacity-10 dark:bg-violet-400">
					<div class="w-1/2 h-full dark:bg-violet-400"></div>
				</div>
				<a rel="noopener noreferrer" href="#" class="flex items-center justify-between w-full">
					<span class="text-xs font-bold tracki uppercase">See more exclusives</span>
					<svg viewBox="0 0 24 24" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-4 stroke-current dark:text-violet-400">
						<line x1="5" y1="12" x2="19" y2="12"></line>
						<polyline points="12 5 19 12 12 19"></polyline>
					</svg>
				</a>
			</div>
		</div>
		<div class="relative flex col-span-12 bg-center bg-no-repeat bg-cover dark:bg-gray-500 xl:col-span-6 lg:col-span-5 md:col-span-9 min-h-96" style="background-image: url('https://source.unsplash.com/random/239x319');">
			<span class="absolute px-1 pb-2 text-xs font-bold uppercase border-b-2 left-6 top-6 dark:border-violet-400 dark:text-gray-100">cree8 technology</span>
			<a class="flex flex-col items-center justify-end p-6 text-center sm:p-8 group dark:via-transparent flex-grow-1 bg-gradient-to-b dark:from-gray-900 dark:to-gray-900">
				<span class="flex items-center mb-4 space-x-2 dark:text-violet-400">
					<span class="relative flex-shrink-0 w-2 h-2 rounded-full dark:bg-violet-400">
						<span class="absolute flex-shrink-0 w-3 h-3 rounded-full -left-1 -top-1 animate-ping dark:bg-violet-400"></span>
					</span>
					<span class="text-sm font-bold">Latest</span>
				</span>
				<h1 rel="noopener noreferrer" href="#" class="font-serif text-2xl font-semibold group-hover:underline dark:text-gray-100">{{$new_posts[0]->title}}</h1>
			</a>
		</div>
		<div class="hidden py-2 xl:col-span-3 lg:col-span-4 md:hidden lg:block">
			<div class="mb-8 space-x-5 border-b-2 border-opacity-10 dark:border-violet-400">
				<button type="button" class="pb-5 text-xs font-bold uppercase border-b-2 dark:border-violet-400">Latest</button>
				<button type="button" class="pb-5 text-xs font-bold uppercase border-b-2 dark:border-transparent dark:text-gray-400">Popular</button>
			</div>
			<div class="flex flex-col divide-y dark:divide-gray-700">
				@foreach($new_posts as $new_post)
				
				<div class="flex  mb-3 px-1 py-4" onclick="getContent('{{$new_post->id}}')">
					<img  alt="" class="flex-shrink-0 object-cover w-20 h-20 mr-4 dark:bg-gray-500" src=" {{$new_post->media->url}}">
					<div class="flex flex-col flex-grow">
						<a rel="noopener noreferrer" href="#" class="font-serif hover:underline">{{$new_post->title}}</a>
						<p class="mt-auto text-xs dark:text-gray-400">{{date('M d, Y',$new_post->created_at->timestamp)}}
							<a rel="noopener noreferrer" href="#" class="block dark:text-blue-400 lg:ml-2 lg:inline hover:underline">{{$new_post->category->name}}</a>
						</p>
					</div>
				</div>
				@endforeach
				
			</div>
		</div>
	</div>
</section>

</body>
</html>
<script>

   function getContent(id){
	window.location.href = '/content/'+id

	}
	 
</script>