[{$smarty.block.parent}]

<tr>
    <td class="edittext">
    [{ oxmultilang ident="MODO_VOUCHERSERIE_MAIN_CREDIT_VOUCHER" }]
    </td>
    <td class="edittext">
    <input type="hidden" name="editval[oxvoucherseries__modoiscreditvoucher]" value="0" [{ $readonly }]>
    <input type="checkbox" name="editval[oxvoucherseries__modoiscreditvoucher]" value="1" [{if $edit->oxvoucherseries__modoiscreditvoucher->value}]checked[{/if}] [{ $readonly }]>
    [{ oxinputhelp ident="MODO_HELP_VOUCHERSERIE_MAIN_CREDIT_VOUCHER" }]
    </td>
</tr>