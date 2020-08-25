<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/jquery-3.5.1.slim.min.js"></script>
	<script src="/js/popper.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<style>

	.contenedor
	{
		width: 850px;
	}

	.descripcion
	{
		text-align: left;
	}
	a
	{
		margin-right: 10px;
	}
	.comprar
	{
		background-color: ;
	}
	.btnproduct
	{
		margin-right: 15px;
		background-color: #39d393;
	}
	.btncarrito
	{
		background-color: #eeb729;
		margin-right: 15px;
	}
	.container
	{
		margin-bottom: 50px;
	}
</style>
</head>
<body>

    <table id="Grid"
            data-toggle="table"
            data-url="@Url.Action("Metodo", "Controller")"  
            data-method="post"
            data-pagination="true"
            data-page-size="10"
            data-search="true"
            data-show-toggle="true"
            data-show-columns="false"
            data-striped="true"
            data-show-export="false"
            data-show-refresh="true"
            data-buttons-class ="primary">
        <thead>
            <tr>
                <th data-field="Data1" data-sortable="true">Col1</th>
                <th data-field="Data2" data-sortable="true">Col2</th>
                <th data-field="Data3" data-sortable="true">Col3</th>
                <th data-field="Data4" data-sortable="true">Col4</th>
                <th data-field="Data5" data-sortable="true">Col5</th>
                <th >DETALLES</th>                    
            </tr>
        </thead>                       
        <tbody>
            <tr>
              <td>Contenido1</td>
              <td>Contenido2</td>
              <td>Contenido3</td>
              <td>Contenido4</td>
              <td>Contenido5</td>
              <td><button>Botón Detalles</button></td>
            </tr>
        </tbody>
    </table>
</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		

</body>
</html>