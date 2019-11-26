<li class="treeview">
  <a href="">
    <i class="fa fa-pie-chart"></i>
    <span>Gestion Administrativa</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
  </a>
    <ul class="treeview-menu" style="display: none;">
      <li>
        <li class="{{ Request::is('pais*') ? 'active' : '' }}">
            <a href="{!! route('pais.index') !!}"><i class="fa fa-map-marker"></i><span>Pais</span></a>
        </li>

        <li class="{{ Request::is('rols*') ? 'active' : '' }}">
            <a href="{!! route('rols.index') !!}"><i class="fa fa-expeditedssl"></i><span>Roles</span></a>
        </li>

        <li class="{{ Request::is('permisos*') ? 'active' : '' }}">
            <a href="{!! route('permisos.index') !!}"><i class="fa fa-cogs"></i><span>Permisos</span></a>
        </li>

        <li class="{{ Request::is('tpMarcacions*') ? 'active' : '' }}">
            <a href="{!! route('tpMarcacions.index') !!}"><i class="fa fa-500px"></i><span>Tipos de Marcaciones</span></a>
        </li>

        <li class="{{ Request::is('tpDocumentoIdentidads*') ? 'active' : '' }}">
            <a href="{!! route('tpDocumentoIdentidads.index') !!}"><i class="fa fa-credit-card"></i><span>Documento de Identidad</span></a>
        </li>
        <li class="{{ Request::is('horarios*') ? 'active' : '' }}">
            <a href="{!! route('horarios.index') !!}"><i class="fa  fa-clock-o"></i><span>Horarios</span></a>
        </li>
      </li>
    </ul>
</li>

<li class="{{ Request::is('empleados*') ? 'active' : '' }}">
    <a href="{!! route('empleados.index') !!}"><i class="fa fa-users"></i><span>Empleados</span></a>
</li>
<li class="{{ Request::is('passwordoEmpleados*') ? 'active' : '' }}">
  <a href="{!! route('passwordoEmpleados.index') !!}"><i class="fa fa-unlock-alt"></i><span>Contraseña de Empleados</span></a>
</li>

<li class="{{ Request::is('marcacions*') ? 'active' : '' }}">
    <a href="{!! route('marcacions.index') !!}"><i class="fa fa-hand-pointer-o"></i><span>Marcaciones</span></a>
</li>
<li class="{{ Request::is('marcacions*') ? 'active' : '' }}">
    <a href="{!! route('marcacions.report') !!}"><i class="fa fa-file-excel-o"></i><span>Reporte Mensual</span></a>
</li>

<li class="{{ Request::is('autorizacionEmpleados*') ? 'active' : '' }}">
    <a href="{!! route('autorizacionEmpleados.index') !!}"><i class="fa fa-user-secret"></i><span>Autorizacion Empleados</span></a>
</li>
