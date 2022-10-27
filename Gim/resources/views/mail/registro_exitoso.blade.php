<div class=row>
    <div class="col">
        <h1> Hola {{$cliente->Nombre_Cliente}}, bienvenido a GimApp</h1>
        <p>Tu registro fue exitoso! <br>Tenemos los siguientes datos registrados:</p>
        <ul>
            <li>Telefono: {{$cliente->Telefono_Cliente}}</li>
            <li>Dirección: {{$cliente->Direccion_Cliente}}</li>
            <li>Correo: {{$cliente->Correo_Cliente}}</li>
            <li>Edad: {{$cliente->Edad_ACliente}}</li>
            <li>Subscripción: {{$cliente->Suscripcion_Cliente}}</li>
        </ul>

        <p>No olvides programar en GimApp tu valoración para quepodamos asignarte una rutina</p>
    </div>

</div>