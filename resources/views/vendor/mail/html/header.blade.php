@props(['url'])
<tr>
    <td class="header">
        <a
            href="{{ $url }}"
            style="display: inline-block;"
        >
            <img
                src="https://brickme.mulayim.app/img/logo.jpg"
                alt="{{ config('app.name') }}"
                style="width: 100px; height: auto;"
            >
        </a>
    </td>
</tr>
