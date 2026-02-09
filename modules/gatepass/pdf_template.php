<?php
ob_start();
?>
<!--for generating the pdf. DOMPDF library transform this HTML to pdf once generated-->
<h2>Equipment Issuance Form</h2>

<p><b>Recipient:</b> <?= $form['recipient'] ?></p>
<p><b>From:</b> <?= $form['issued_from'] ?></p>
<p><b>Date:</b> <?= $form['issue_date'] ?></p>

<table border="1" width="100%" cellpadding="5">
<tr>
  <th>Qty</th>
  <th>Description</th>
</tr>
<?php foreach ($items as $item): ?>
<tr>
  <td><?= $item['quantity'] ?></td>
  <td><?= $item['description'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<br>

<table width="100%">
<tr>
<?php foreach ($signatures as $sig): ?>
<td align="center">
  <img src="<?= $sig['file_path'] ?>" width="150"><br>
  <?= ucfirst($sig['role']) ?>
</td>
<?php endforeach; ?>
</tr>
</table>

<?php
return ob_get_clean();
