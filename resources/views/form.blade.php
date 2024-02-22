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
	
	<style>
      header {
        background:url("{{asset('image/farmbg.jpg')}}");}
        #preview{
            display: none;
        }
	</style>
</head>

<body>



<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div class=" mb-8 md:flex">
                            <div class="flex-1 w-full md:w-1/2 ">

                                <div class="mb-4">
                                    <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label></br>
                                    <input id="title" type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="" required>
                                </div>

                                <div class="mb-4">
                                    <label class="text-xl text-gray-600">Author <span class="text-red-500">*</span></label></br>
                                    <input id="author" type="text" class="border-2 border-gray-300 p-2 w-full" name="description" id="description" >
                                </div>

                                <div class=" p-1">
                                    <label class="text-xl text-gray-600">Category <span class="text-red-500">*</span></label></br>
                                    <select id = "category" class="border-2 border-gray-300 p-2 w-full" name="action">
                                    @foreach($categories as $category)
                                        <option>{{$category}}</option>
                                    @endforeach
                                       
                                        
                                    </select>
                                    
                                </div>
                            </div>

                            <div class="flex-1 ">

                
                                <div class="flex justify-center mt-8">
                                    <div class="rounded-lg shadow-xl bg-gray-50 ">
                                        <div class="m-4">
                                            <label class="inline-block mb-2 text-gray-500">Upload
                                                Image(jpg,png,svg,jpeg)</label>
                                            <div class="flex items-center justify-center w-full">
                                                <label class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
                                                    <div class="flex flex-col items-center justify-center pt-7">
                                                        <svg id='img-logo' xmlns="http://www.w3.org/2000/svg"
                                                            class="w-12 h-12 text-gray-400 group-hover:text-gray-600" viewBox="0 0 20 20"
                                                            fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <img class="w-full h-24" id="preview" src= ""/>
                                                        <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                                            Select a photo</p>
                                                    </div>
                                                    <input id = "fileInput" onchange='handleChange(event)' type="file" class="opacity-0" />
                                                </label>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>

                            </div>


                        </div>
                    
                        

                        <div class="mb-8">
                            <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
                            <textarea id="content" name="content" class="border-2 border-gray-500">
                                
                            </textarea>
                        </div>

                        <div class="flex p-1">
                            <select class="border-2 border-gray-300 border-r p-2" name="action">
                                <option>Save and Publish</option>
                                <option>Save Draft</option>
                            </select>
                            <button onclick="postBlog()" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                        </div>
    </div>
                </div>
            </div>
        </div>
    </div>

</body>



    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        editor = CKEDITOR.replace( 'content' );
      

      file =''
       
        function addFile(file){
            imgLogo = document.getElementById('img-logo').style.display = 'none'
            
            preview = document.getElementById('preview')
            preview.style.display = 'block'
            preview.src = URL.createObjectURL(file)

           url = URL.createObjectURL(file);
           console.log(url)

        }

        const handleChange = event => {
            console.log('handle')
            for (let file of event.target.files) {
                this.file = file
                addFile(file);
            }
        
        }

        function postBlog(){
        
      
           
            title = document.getElementById('title').value
            author = document.getElementById('author').value
            content = editor.getData()
            console.log(this.file)
            category = document.getElementById('category').value
            
            var bodyFormData = new FormData();
            bodyFormData.append('title', title, )
            bodyFormData.append('content', content)
            bodyFormData.append('author', author, )
            bodyFormData.append('category', category)
            bodyFormData.append('images', this.file)
          
            axios.post( '/blog', bodyFormData , {
                headers: { "Content-Type": "multipart/form-data" },
            }
                        
            ).then(response => {
                if(response.status == 200){
                    window.location.href = '/admin/form'
                }
            })

        }

      

    </script>