<form method="post">
	<table class="dv-table" style="width:100%;background:#fafafa;padding:5px;margin-top:5px;">
		<tr>
			<td>Descrição</td>
			<td><input name="descricao" width="250px" class="easyui-validatebox" required="true"></input></td>
		</tr>
	</table>
	<div style="padding:5px 0;text-align:right;padding-right:30px">
		<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="saveItem(<?php echo $_REQUEST['index'];?>)">Gravar</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" plain="true" onclick="cancelItem(<?php echo $_REQUEST['index'];?>)">Cancelar</a>
	</div>
</form>

