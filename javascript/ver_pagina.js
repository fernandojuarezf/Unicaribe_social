
// JavaScript Document<script language="javascript">
	function Verpagina(pag) {	
			document.datos.action=pag;
			document.datos.target="localscene";
			document.datos.submit();
			
		}
		function salir(){
			
			document.datos.action="http://www.utcancun.edu.mx";
		document.datos.submit();
			
		}
		