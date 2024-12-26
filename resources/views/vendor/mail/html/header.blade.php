@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}">
            <img
                src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMzE2IDMxNiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMzE2IiBoZWlnaHQ9IjMxNiIgZmlsbD0iI0ZGRDkwMCIvPjxyZWN0IHg9Ijk4IiB5PSIxNDUiIHdpZHRoPSIxMjAiIGhlaWdodD0iMjYiIGZpbGw9IiMxQTFBMUEiLz48L3N2Zz4="
                alt="{{ config('app.name') }}"
                style="width: 100px; height: auto;"
            >
        </a>
    </td>
</tr>
