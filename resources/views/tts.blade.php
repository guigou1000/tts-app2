<!DOCTYPE html>
<html>
<head>
    <title>Text to Speech</title>
</head>
<body>
    <h1>Text-to-Speech Laravel</h1>
    <form action="{{ route('speak') }}" method="POST">
        @csrf
        <input type="text" name="text" placeholder="Digite um texto" required>
        <button type="submit">Ouvir</button>
    </form>

    @if(isset($audioUrl))
        <h3>Texto: {{ $originalText }}</h3>
        <audio controls autoplay>
            <source src="{{ $audioUrl }}" type="audio/mpeg">
            Seu navegador não suporta áudio.
        </audio>
    @endif
</body>
</html>