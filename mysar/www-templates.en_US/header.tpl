<!DOCTYPE html>
<html>
<head>
  <style>
    .wrapper {
      width: 100%;
      max-width: 950px;
      margin: auto;
      background-color: #d6e4f0;
      padding: 1rem;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-family: Arial, sans-serif;
      font-size: 13px;
      background-color: #ffffff;
    }

    th, td {
      padding: 6px 8px;
      text-align: center;
      border-bottom: 1px solid #ccc;
    }

    thead th {
      background-color: #d6e4f0;
      color: #000;
      white-space: nowrap;
    }

    tr:nth-child(even) {
      background-color: #f2f6fc;
    }

    tr:nth-child(odd) {
      background-color: #ffffff;
    }

    tr:hover {
      background-color: #cce5ff;
    }

    .footer-table {
      margin-top: 1rem;
      width: 100%;
      font-size: 12px;
      color: #333;
      text-align: center;
    }

    .sortable-header {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 4px;
    }

    .sortable-header img {
      width: 10px;
      height: 10px;
    }
  </style>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{$pageVars.programName} {$pageVars.programVersion}</title>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
  <script src="bootstrap/js/jquery-1.11.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="dfl.css" type="text/css">

  {literal}
  <script language="JavaScript">
    function my_confirm(msg, go) {
      if (confirm(msg)) {
        window.location = go;
      }
    }
  </script>
  {/literal}
</head>

<body>
  <div class="wrapper">
    <center>
      <h1>{$pageVars.programName} {$pageVars.programVersion}</h1>
      <p>
        [
        <a href=".">Daily Report</a>
        |
        <a href="{$smarty.server.PHP_SELF}?a=administration">Administration</a>
        ]
      </p>
    </center>
