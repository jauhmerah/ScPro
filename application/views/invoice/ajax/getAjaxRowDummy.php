<tr id="row<?= $n; ?>><td colspan="8" style="color: #000000;" ><input type="text" id="name" style="width:450px;" name="name" class="w3-input w3-border-0" required></td><td style="color: #000000;"><input type="text" id="name" style="width:60px;" name="name" class="w3-input w3-border-0" required></td><td style="color: #000000;"><input type="text" id="name" style="width:60px;" name="name" class="w3-input w3-border-0" required> </td><td style="color: #000000;"><input type="text" id="name" style="width:60px;" name="name" class="w3-input w3-border-0" required ></td><td style="color: #000000;"><input type="text" id="name" style="width:85px;" name="name" class="w3-input w3-border-0" required><div class="delBtn" ><button type="button" class="btn btn-danger btn-xs delB btn-circle" id="row<?= $n; ?>">x</button></div><script>
	$(document).ready(function() {
		$(".delBtn").click(function() {
			$('#row<?= $n; ?>').remove();
		});
	});
</script></td></tr>
