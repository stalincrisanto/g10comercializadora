function Menus (codigo_perfil)
{
    //alert(codigo_perfil);
    $.ajax({
        url: '../controlador/menu/menu.php',
        type: 'POST',
        data:{
            codigo_perfil: codigo_perfil
        }
    }).done(function(resp){
        var datos = JSON.parse(resp);
        console.log(datos);
        let menu_personal = "";
        let menu_personal_padre = document.getElementById("menu_personal");
        let menu_comercializacion = "";
        let menu_comercializacion_padre = document.getElementById("menu_comercializacion");
        let menu_finanzas = "";
        let menu_finanzas_padre = document.getElementById("menu_finanzas");
        let menu_seguridad = "";
        let menu_seguridad_padre = document.getElementById("menu_seguridad");


        for(let i = 0; i < datos.length; i++)
        {
            if(datos[i].SISTEMA === 'Personal')
            {
                menu_personal_padre.style.display = "inline";
                menu_personal += "<li><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+datos[i].SUBSISTEMA+"</a></li>";
            }
            $("#menu_personal_tablas").html(menu_personal);
            if(datos[i].SISTEMA === 'Comercialización')
            {
                menu_comercializacion_padre.style.display = "inline";
                menu_comercializacion += "<li><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+datos[i].SUBSISTEMA+"</a></li>";
            }
            $("#menu_comercializacion_tablas").html(menu_comercializacion);
            if(datos[i].SISTEMA === 'Finanzas')
            {
                menu_finanzas_padre.style.display = "inline";
                menu_finanzas += "<li><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+datos[i].SUBSISTEMA+"</a></li>";
            }
            $("#menu_finanzas_tablas").html(menu_finanzas);
            if(datos[i].SISTEMA === 'Seguridad')
            {
                menu_seguridad_padre.style.display = "inline";
                menu_seguridad += "<li><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+datos[i].SUBSISTEMA+"</a></li>";
            }
            $("#menu_seguridad_tablas").html(menu_seguridad);
        }
        
        /**if(datos[0].SISTEMA === 'Personal')
        {
            menu_personal_padre.style.display = "inline";
        }

        if(datos[0].SISTEMA == 'Comercialización')
        {
            menu_comercializacion_padre.style.display = "inline";
        }**/
    })
}