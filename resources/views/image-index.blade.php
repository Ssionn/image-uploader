<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Image Uploader</title>

    @vite('resources/css/app.css')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
</head>

<body>

    <h1 class="text-4xl font-bold mt-10 text-center">Image Uploader</h1>
    <div class="flex justify-center flex-col items-center min-h-max">
        <div class="mt-32 w-1/2">
            <form action="{{ route('image-index') }}">
                <label for="avatar" :value="__('Avatar')" />
                <input id="avatar" type="file" name="avatar" required />
                <button type="submit" class="px-6 py-3 bg-gray-100 rounded-md items-center">Upload</button>
            </form>
        </div>

        <div class="mt-32 flex justify-center">
            <table style="border-spacing: 10px 5px;"> <!-- Adjusts spacing between cells -->
                <thead>
                    <tr>
                        <th class="p-[10px]">Image Folder</th>
                        <th class="p-[10px]">Image Filename</th>
                        <th class="p-[10px]"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $image)
                        <tr>
                            <td class="p-[10px]">{{ $image->folder }}</td>
                            <td class="p-[10px]">{{ $image->filename }}</td>
                            <td class="p-[10px]">
                                <form action="{{ route('image-delete', $image->folder) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-6 py-3 text-white bg-red-500 rounded-md items-center">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-32 flex flex-col justify-center">
            <h1 class="text-4xl font-bold text-center">All Images Uploaded</h1>
            <div class="mt-12 mb-10 flex justify-center flex-col items-center">
                @foreach ($actualImages as $actualImage)
                    <img src="{{ $actualImage['path'] }}" alt="image" class="w-1/3 h-1/3">
                    <h1 class="font-bold mt-2">{{ $actualImage['filename'] }}</h1>
                @endforeach
            </div>
        </div>
    </div>


    @section('scripts')
        <script>
            const inputElement = document.querySelector('input[id="avatar"]');
            const pond = FilePond.create(inputElement);
            FilePond.setOptions({
                server: {
                    url: '/upload',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    checkValidity: true
                }
            })
        </script>
    @endsection
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    @yield('scripts')
</body>

</html>
