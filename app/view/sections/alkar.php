<section id="alkar-web">
    <div class="content-master">
        <div class="__row _grid _warp _content-s-around _aling-center">
            <div class="__col__">
                <form action="record/save.php" method="POST" id="alkar_record">
                    <div class="content-box _flex _warp _direction-col">
                        <div class="item">
                            <label for="tipo_corte">Tipo de corte</label>
                            <select name="tipo_corte" id="tipo_corte" required>
                                <option value="0" disabled selected>Seleccione una opcion</option>
                                <option value="1">liberado</option>
                                <option value="2">transferido</option>
                                <option value="3">cortado</option>
                            </select>
                        </div>
                        <div class="item _flex _aling-center _content-s-around">
                            <label for="satisfaccion">Satisfaccion</label>
                            <div class="radio_btn _flex _direction-col _aling-center">
                                <input type="radio" id="insa0" name="satisfaccion" value="0" checked>
                                <label for="insa0">NC</label>
                            </div>
                            <div class="radio_btn _flex _direction-col _aling-center">
                                <input type="radio" id="insa1" name="satisfaccion" value="1">
                                <label for="insa1">1</label>
                            </div>
                            <div class="radio_btn _flex _direction-col _aling-center">
                                <input type="radio" id="insa2" name="satisfaccion" value="2">
                                <label for="insa2">2</label>
                            </div>
                            <div class="radio_btn _flex _direction-col _aling-center">
                                <input type="radio" id="insa3" name="satisfaccion" value="3">
                                <label for="insa3">3</label>
                            </div>
                            <div class="radio_btn _flex _direction-col _aling-center">
                                <input type="radio" id="insa4" name="satisfaccion" value="4">
                                <label for="insa4">4</label>
                            </div>
                            <div class="radio_btn _flex _direction-col _aling-center">
                                <input type="radio" id="insa5" name="satisfaccion" value="5">
                                <label for="insa5">5</label>
                            </div>
                        </div>
                        <div class="item _flex _direction-col _aling-start">
                            <label for="in_time">inicio de llamada</label>
                            <!-- <input type="time" name="in_time" id="in_time" step="" value="00:00:00" > -->
                            <input type="text" class="form-control js-time-picker" value="00:00:00" id="in_time" required>
                        </div>
                        <div class="item _flex _direction-col _aling-start">
                            <label for="out_time">fin de llamada</label>
                            <!-- <input type="time" name="out_time" id="out_time" step="" value="00:00:00" > -->
                            <input type="text" class="form-control js-time-picker" value="00:00:00" id="out_time" required>
                        </div>
                        <div class="item">
                            <button type="submit">guardar</button>
                        </div>
                        <div class="item">
                            <span class="status"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="__col__">
                <div class="box _history-alkar">
                    <!-- aqui ira los calculos bestias -->
                    <div class="box _stats-alkar">
                        <div class="box_content _alkar-btns">

                        </div>
                        <div class="box-content _alkar-data">
                            <div class="box " id="satisfaccion">
                                <p>Satisfaccion</p>
                                <div class="_flex _content-s-around">
                                    <div class="hoy">
                                        <div class="titulo">hoy</div>
                                        <div class="content _flex  _aling-center">cargando...</div>
                                    </div>
                                    <div class="semana">
                                        <div class="titulo">esta semana</div>
                                        <div class="content _flex  _aling-center">cargando...</div>
                                    </div>
                                    <div class="mes" >
                                        <div class="titulo"> este mes</div>
                                        <div class="content _flex  _aling-center">cargando...</div>
                                    </div>
                                </div>
                            </div>
                            <div class="box " id="liberacion">
                                <p>Liberacion</p>
                                <div class="_flex _content-s-around">
                                    <div class="hoy">
                                        <div class="titulo">hoy</div>
                                        <div class="content _flex  _aling-center">cargando...</div>
                                    </div>
                                    <div class="semana">
                                        <div class="titulo">esta semana</div>
                                        <div class="content _flex  _aling-center">cargando...</div>
                                    </div>
                                    <div class="mes" >
                                        <div class="titulo"> este mes</div>
                                        <div class="content _flex  _aling-center">cargando...</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="__col__">
                <div class="box _tabla-today-alkar">
                    <table id="alkar-today" class="display">
                        <thead>
                            <tr>
                                <th>Tipo de corte</th>
                                <th>Calificacion</th>
                                <th>Inicio de llamada</th>
                                <th>Fin de llamada</th>
                                <th>Duracion</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>