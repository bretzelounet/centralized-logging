<div class="section">
    <div class="container">
        <div class="row">
            <div class="col s4 m4 l4">
                <p></p>
            </div>
            <div class="col s4 m4 l4">
                <div class="card">
                    <div class="card-header"><span class="card-title">Settings</span></div>
                    <div id="settings" class="card-content">
                        <div class="row">
                            <form class="col s12" method="post" accept-charset="utf-8" action="settings/index/true">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input value="<?php echo $params["history_server"]; ?>" name="history_server" id="history_server" type="text" class="validate" required>
                                        <label for="history_server">Job history server address (http://ip:19888)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input value="" name="spark_server" id="spark_server" type="text" class="validate" required>
                                        <label for="spark_server">Spark server address (http://ip:11000)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input value="<?php echo $params["oozie_server"]; ?>" name="oozie_server" id="oozie_server" type="text" class="validate" required>
                                        <label for="oozie_server">Oozie server address (http://ip:11000)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input value="<?php echo $params["log_directory"]; ?>" name="log_directory" id="log_directory" type="text" class="validate" required>
                                        <label for="log_directory">Log directory (Yarn logs must be aggregated)</label>
                                    </div>
                                </div>
                                <input type="submit" class="waves-effect waves-light btn orange" style="float:right;" value="Save">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s4 m4 l4"></div>
        </div>
    </div>
</div>