<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Laravel</title>
</head>
<body class="bg-gray-200 py-10">
<div class="max-w-lg bg-white mx-auto p-5 rounded shadow">
    <form action="tags" method="post" class="flex mb-4">
        @csrf
        <input type="text" name="name" id="" class="rounded-l bg-gray-200 p-4 w-full outline-none"
               placeholder="Nueva etiqueta">
        <input type="submit" value="Agregar" class="rounded-r px-8 bg-blue-500 text-white outline-none">
    </form>
    <h4 class="text-lg text-center mb-4">Listado de etiquetas</h4>
    <table>
        @forelse( $tags as $tag )
            <tr>
                <td class="border px-4 py-2">{{ $tag->name }}</td>
                <td class="border px-4 py-2">{{ $tag->slug }}</td>
                <td class="px-4 py-2">
                    <form action="tags/{{$tag->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Borrar" class="px-3 rounded bg-red-500 text-white">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td>
                    <p>No hay etiquetas</p>
                </td>
            </tr>
        @endforelse
    </table>
</div>
</body>
</html>
