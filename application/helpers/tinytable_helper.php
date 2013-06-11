<?php
function tinytable($records, $fields){
    ?>
    <div id="tablewrapper">
        <div id="tableheader">
            <div class="search">
                <table>
                    <tr>
                        <td>Filtrar: </td>
                        <td><select id="columns" onchange="sorter.search('query')"></select></td>
                        <td><input type="text" id="query" onkeyup="sorter.search('query')" /></td>
                    </tr>
                </table>
            </div>
            <span class="details">
                <div>Registros <span id="startrecord"></span>-<span id="endrecord"></span> de <span id="totalrecords"></span></div>
                <div><a href="javascript:sorter.reset()">Resetar</a></div>
            </span>
        </div>
        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
            <thead>
                <tr>
                    <th class="nosort"><div></div></th>
                    <?php
                    foreach ($fields as $key => $value) {
                      echo "<th><div>{$value}</div></th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($records as $record) {
                    ?>
                    <tr class="row-tinytable">
                        <td align="center"><input type="checkbox" name="row<?=$i?>" id="row<?=$i?>" class="jsform" value="<?=$record->id?>" /></td>
                        <?php
                        foreach ($fields as $key => $value) {
                            echo "<td>".utf8_decode($record->$key)."</td>";
                          }
                        ?>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
        <div id="tablefooter">
            <div id="tablenav">
                <div>
                    <img src="<?php echo base_url()?>images/tinytable/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
                    <img src="<?php echo base_url()?>images/tinytable/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
                    <img src="<?php echo base_url()?>images/tinytable/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
                    <img src="<?php echo base_url()?>images/tinytable/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
                </div>
                <div>
                    <select id="pagedropdown"></select>
                </div>
                <div>
                    <a href="javascript:sorter.showall()">Visualizar Todos</a>
                </div>
            </div>
            <div id="tablelocation">
                <table>
                    <tr>
                        <td>
                            <span>Registros por P&aacute;gina</span>
                        </td>
                        <td>
                            <select onchange="sorter.size(this.value)">
                                <option value="5">5</option>
                                <option value="10" selected="selected">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </td>
                        <td>
                            <div class="page">P&aacute;gina <span id="currentpage"></span> de <span id="totalpages"></span></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php
}
?>
