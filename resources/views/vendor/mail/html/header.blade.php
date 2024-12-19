@props(['url'])
<tr>
    <td class="header">
        <a
            href="{{ $url }}"
            style="display: inline-block; color: #ffe60d;"
        >
            @if (trim($slot) === config('app.name'))
                <img
                    class="logo"
                    src="{{ asset('img/logo.svg') }}"
                    alt="{{ config('app.name') }}"
                >
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
