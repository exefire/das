<?php if(isset($_SISTEMA['pagina_n'])&&$_SISTEMA['paginas']>0){?>
<div style="padding:10px; text-align:center;">
  <table border="0" align="center" cellpadding="5" cellspacing="0">
    <tr align="center">
      <td style="width:100px;" class="texto"><?php if($_SISTEMA['pagina_n']!=1){?>
        <a href="<?php echo agrega_get("pagina_n",1); ?>" title="Primera Página">&lt;&lt; Primera</a>
        <?php }else{?>&lt;&lt; Primera<?php }?></td>
      <td style="width:100px;" class="texto"><?php if($_SISTEMA['pagina_n']!=1){?>
        <a href="<?php echo agrega_get("pagina_n",$_SISTEMA['pagina_n']-1); ?>" title="Página Anterior">&lt; Anterior</a>
        <?php }else{?>&lt; Anterior<?php }?></td>
      <td style="width:150px;" class="texto">P&aacute;gina <?php echo numero($_SISTEMA['pagina_n']); ?> de <?php echo numero($_SISTEMA['paginas']); ?></td>
      <td style="width:100px;" class="texto"><?php if($_SISTEMA['pagina_n']!=$_SISTEMA['paginas']){?>
        <a href="<?php echo agrega_get("pagina_n",$_SISTEMA['pagina_n']+1); ?>" title="Siguiente Página">Siguiente &gt;</a>
        <?php }else{?>Siguiente &gt;<?php }?></td>
      <td style="width:100px;" class="texto"><?php if($_SISTEMA['pagina_n']!=$_SISTEMA['paginas']){?>
        <a href="<?php echo agrega_get("pagina_n",$_SISTEMA['paginas']); ?>" title="Última Página">&Uacute;ltima &gt;&gt;</a>
        <?php }else{?>&Uacute;ltima &gt;&gt;<?php }?></td>
    </tr>
    <tr align="center">
      <td style="width:100px;" class="texto">&nbsp;</td>
      <td style="width:100px;" class="texto">&nbsp;</td>
      <td style="width:150px;" class="texto"><?php echo numero($_SISTEMA['paginacion_total']); ?> Registro<?php if($_SISTEMA['paginacion_total']>1){echo "s";}  ?>.</td>
      <td style="width:100px;" class="texto">&nbsp;</td>
      <td style="width:100px;" class="texto">&nbsp;</td>
    </tr>
  </table>
</div><?php }?>