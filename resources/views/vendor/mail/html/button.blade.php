<table class="action table text-center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td>
            <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td class=" text-center">
                        <table cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                                <td>
                                    <a href="{{ $url }}" class="button button-{{ $color ?? 'primary' }}" target="_blank">{{ $slot }}</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
