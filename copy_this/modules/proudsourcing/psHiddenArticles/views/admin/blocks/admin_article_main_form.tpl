[{* psHiddenArticles *}]
[{$smarty.block.parent}]
<tr>
    <td class="edittext" width="120">
        [{oxmultilang ident="PSHIDEARTICLES_ARTICLE_MAIN_HIDDEN" }]
    </td>
    <td class="edittext">
        <input type="hidden" name="editval[oxarticles__pshidden]" value="0">
        <input class="edittext" type="checkbox" name="editval[oxarticles__pshidden]" value='1' [{if $edit->oxarticles__pshidden->value == 1}]checked[{/if}] [{$readonly }]>
        [{oxinputhelp ident="HELP_PSHIDEARTICLES_ARTICLE_MAIN_HIDDEN" }]
    </td>
</tr>
