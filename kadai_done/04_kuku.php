<!-- /**
 * 九九の表をHTMLで作ってください。
 */  -->

<!DOCTYPE html>
<html>
  <table border="1">
    <tr>
      <th></th>
      <?php for ($first_number = 1; $first_number <= 9; $first_number++): ?>
        <th>
          <?php echo $first_number; ?>
        </th>
      <?php endfor; ?>
    </tr>

    <?php for ($second_number = 1; $second_number <= 9; $second_number++): ?>
      <tr>
        <th>
          <?php echo $second_number; ?>
        </th>
          <?php for ($first_number = 1; $first_number <= 9; $first_number++): ?>
            <td>
              <?php echo $first_number * $second_number; ?>
            </td>
          <?php endfor; ?>
      </tr>
    <?php endfor; ?>
  </table>
</html>