<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title><![CDATA[ {{ $Configuracoes->nomedosite }} ]]></title>
        <link><![CDATA[ {{url('feed')}} ]]></link>
        <description><![CDATA[ {{ $Configuracoes->descricao }} ]]></description>
        <language>pt-br</language>
        <pubDate>{{ now() }}</pubDate>

        @foreach($posts as $post)
            <item>
                <title><![CDATA[{{ $post->titulo }}]]></title>
                <link>{{ url('blog/artigo/'.$post->slug) }}</link>
                <image>{{ $post->cover() }}</image>
                <description><![CDATA[{!! strip_tags($post->getContentWebAttribute()) !!}]]></description>
                <category>{{ $post->categoriaObject->titulo }}</category>
                <author><![CDATA[{{ $post->userObject->name }}]]></author>
                <guid>{{ $post->id }}</guid>
                <pubDate>{{ $post->created_at }}</pubDate>
            </item>
        @endforeach

        @foreach($servicos as $servico)
            <item>
                <title><![CDATA[{{ $servico->titulo }}]]></title>
                <link>{{ url('area-de-atuacao/'.$servico->slug) }}</link>
                <image>{{ $servico->cover() }}</image>
                <description><![CDATA[{!! strip_tags($servico->getContentWebAttribute()) !!}]]></description>
                <category>{{ $servico->categoriatext }}</category>
                <author><![CDATA[{{ $servico->userObject->name }}]]></author>
                <guid>{{ $servico->id }}</guid>
                <pubDate>{{ $servico->created_at }}</pubDate>
            </item>
        @endforeach

        {{--@foreach($projetos as $projeto)
            <item>
                <title><![CDATA[{{ $projeto->titulo }}]]></title>
                <link>{{ url('projeto/'.$projeto->slug) }}</link>               
                <image>{{ $projeto->cover() }}</image>
                <description><![CDATA[{!! strip_tags($projeto->getContentWebAttribute()) !!}]]></description>
                <category>{{ $projeto->categoria }}</category>
                <author><![CDATA[ {{ $Configuracoes->nomedosite }} ]]></author>
                <guid>{{ $projeto->id }}</guid>
                <pubDate>{{ $projeto->created_at }}</pubDate>
            </item>
        @endforeach--}}        
    </channel>
</rss>