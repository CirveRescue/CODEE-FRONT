 <!-- Tabla de Entradas -->
 <h2>Entradas Recientes</h2>
 <table class="table table-striped">
     <thead>
         <tr>
            <th>ID</th>
             <th>Placa</th>
             <th>Modelo</th>
             <th>Color</th>
             <th>Hora de Entrada</th>
             <th>Dueño</th> <!-- Nuevo campo para mostrar el dueño del vehículo -->
         </tr>
     </thead>
     <tbody>
         @foreach ($vehiculosDentro as $vehiculo)
             <tr>
                <td>{{ $vehiculo->id }}</td>
                 <td>{{ $vehiculo->vehiculo->Placa }}</td>
                 <td>{{ $vehiculo->vehiculo->Modelo }}</td>
                 <td>{{ $vehiculo->vehiculo->Color }}</td>
                 <td>{{ $vehiculo->fecha_movimiento }}</td>
                 <td>{{ $vehiculo->usuario->Nombre }}</td>
             </tr>
         @endforeach
     </tbody>
 </table>
