
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
	
	
</head>
<body>

<div class=" bg-green max-w-screen-xl mx-auto p-5 sm:p-8 md:p-12 relative">
    <div class="bg-cover h-64 text-center overflow-hidden"
        style="height: 300px; background-image: url('{{$post->media->url}}')">
    </div>
    <div class="max-w-2xl md:p-12 mx-auto">
        <div
            class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
          
            <div class="">

               
                <a href="#"
                    class="text-xs text-indigo-600 uppercase font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                    {{$post->category->name}}
                </a>
                <h1 href="#" class="text-gray-900 font-bold text-3xl mb-2">{{$post->title}}</h1>
                <p class="text-gray-700 text-xs mt-2">Written By:
                    <a href="#"
                        class="text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                        {{$post->author}}
                    </a>
                </p>

                 <p>{!! ($post->content) !!}</p>

            </div>

        </div>
    </div>
</div>

</body>
</html>

<script>
    
</script>


