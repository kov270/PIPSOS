<?php
session_start();
date_default_timezone_set('Europe/Moscow');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laboratory 1</title>

    <link rel="stylesheet" href="https://unpkg.com/terminal.css@0.7.1/dist/terminal.min.css"/>
    <link rel="stylesheet" href="custom.css"/>

</head>
<body>
<canvas height="200" width="250"></canvas>

<br>
<div class="text-center container">
    <h1 class="main_head">Коваленко Илья Русланович P3210 2107</h1>
    <h3>Current time: <?php echo date("h:i:s"); ?></h3>

    <form action="compute.php" method="get" class="mx-auto h-50 w-50" name="main">

        <table>
            <tr>
                <td><img src="areas.png" style="max-width: 35rem"></td>

                <td>
                    <fieldset>
                        <legend>X coord:</legend>
                        <table>
                            <tr>
                                <td>
                                    <input type="radio" id="xChoice1"
                                           name="x" value="-2" required>
                                    <label for="xChoice1">-2</label>
                                </td>
                                <td>
                                    <input type="radio" id="xChoice2"
                                           name="x" value="-1.5">
                                    <label for="xChoice2">-1.5</label>
                                </td>
                                <td>
                                    <input type="radio" id="xChoice3"
                                           name="x" value="-1">
                                    <label for="xChoice3">-1</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="radio" id="xChoice10"
                                           name="x" value="-0.5">
                                    <label for="xChoice10">-0.5</label>
                                </td>
                                <td>
                                    <input type="radio" id="xChoice4"
                                           name="x" value="0">
                                    <label for="xChoice4">0</label>
                                </td>
                                <td>
                                    <input type="radio" id="xChoice5"
                                           name="x" value="0.5">
                                    <label for="xChoice5">0.5</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="radio" id="xChoice6"
                                           name="x" value="1">
                                    <label for="xChoice6">1</label>
                                </td>
                                <td>
                                    <input type="radio" id="xChoice7"
                                           name="x" value="1.5">
                                    <label for="xChoice7">1.5</label>
                                </td>
                                <td>
                                    <input type="radio" id="xChoice8"
                                           name="x" value="2">
                                    <label for="xChoice8">2</label>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="R">R param:</label>
                    <select size="5" name="r" id="R">
                        <option disabled>Select value</option>
                        <option value="1">1</option>
                        <option selected value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td>
                    <label for="y">Y coord:</label>
                    <input type="text" id="y" class="form-control" name="y" placeholder="(-5 ... 3)" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="clear">Clear last results</label><br>
                    <input type="checkbox" id="clear" name="clear">
                </td>
                <td>
                    <input type="submit" class="btn btn-default" value="Submit" name="submit">
                </td>
            </tr>
            <tr>
                <td>
                </td>
            </tr>
        </table>

    </form>

    <br>
    <h2>Results:</h2>
    <table class="table">
        <tr>
            <td>R</td>
            <td>X</td>
            <td>Y</td>
            <td>Result</td>
            <td>Work time</td>
            <td>Req. time</td>
        </tr>
        <?php
        if (isset($_SESSION["arr"]))
            foreach ($_SESSION["arr"] as $el)
                print $el;
        ?>
    </table>
</div>
<script src="validator.js"></script>
<script src="eyes.js"></script>

</body>
</html>