<!DOCTYPE html>
<html lang="es">
    <head>
        <title>TP N° 8</title>
    </head>
        
            <center><h1><b>CARRO</b> - Pasión por su casa</h1></center>
       
<?php


function crearArchivo()
{
    $Archivo = fopen("C:\\Users\\Uriel\\Documents\\DATOS\\clientes.txt", "a"); 
        fwrite($Archivo, "pereyra,juan,capFederal,4526-9865,126, \n");
        fwrite($Archivo, "díaz,juan,haedo,3356-5899,1200,,\n");
        fwrite($Archivo, "fernandez,martín,capFederal,4525-5666,1578,2");
        fclose($Archivo);
}

function cargarDatos()
{
    global $clientes, $gastos, $n_cuotas, $deudas;
    $Archivo = fopen("C:\\Users\\Uriel\\Documents\\DATOS\\clientes.txt", "r");
    $i=0;
    while(($linea = fgets($Archivo, 4096,)) !=FALSE)
    {
        list($clientes[$i]["apellido"], $clientes[$i]["nombre"], $clientes[$i]["localidad"], $clientes[$i]["telefono"], $gastos[$i], $n_cuotas[$i]) = explode(",", $linea, 6); 
       
        if($n_cuotas>0)
        {
            $n_coutas[$i] = $deudas;
            $deudas[$i] = $clientes[$i]["apellido"];
        }
        $i++;
    }
    fclose($Archivo);
}

function cadenafecha($meses)
{
    $date = "02/02/2007";
    $fecha = explode("/", $date);
    echo "Resumen hecho el " . $fecha[0] . " de " . $meses[2] . " de " . $fecha[2];
}


function mes($first)
{
 return $first[3];
}
    
function formatclient($n_cuotas, $clientes, $gastos)
    {
        for($i=0;$i<count($clientes); $i++)
        {
            $cuotas_pendientes = "";
            if(isset($n_cuotas[$i]))
            {
                $cuotas_pendientes =  "Pero debe " . $n_cuotas[$i] . " cuotas<br>";  
            }
        
            if($gastos[$i] > 1000)
            {
                echo ($i) . " - " . ucfirst($clientes[$i]["apellido"]) . " " . ucfirst($clientes[$i]["nombre"]) . "<br>" . ucwords($clientes[$i]["localidad"]) . "<br>" . $cuotas_pendientes ."\n"."<br>";    
            }
        
        
        }
    }   

function prepararDirectorio($dir)
    {    
        if(!is_dir($dir))
            {
                mkdir($dir);
                chdir($dir);
                CrearArchivo(); 
            }
        else
        {
        is_dir($dir);
        if(file_exists("C:\\Users\\Uriel\\Documents\\DATOS\\clientes.txt"))
            {
                unlink("C:\\Users\\Uriel\\Documents\\DATOS\\clientes.txt");    
            }           
        rmdir($dir);
        mkdir($dir);
        chdir($dir);
        CrearArchivo();
        } 
    }   
    
$meses = array(1=>"Enero", 2=>"Febrero", 3=>"Marzo", 4=>"Abril", 5=>"Mayo");
$origen = "C:\\Users\\Uriel\\Documents";//usar carpetas locales
$dir = "C:\\Users\\Uriel\\Documents\\DATOS";//usar carpetas locales
    
prepararDirectorio($dir);
opendir($dir);
cargarDatos();
asort($gastos);

    
    formatclient($n_cuotas, $clientes, $gastos);
    end($gastos);
    echo "<h3>Clientes del mes de " . mes($meses)."</h3><br>"; 
    echo "<br>";
    echo "El mejor cliente gastó: $". number_format(current($gastos), 2,',', '.');
    echo "<br><br>";
    echo "<hr>";
   
?>

<center><?php echo cadenafecha($meses); ?></center>

</body>
</html>
