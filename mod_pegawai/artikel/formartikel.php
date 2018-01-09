<form id="formberita" method="post" action="saveartikel.php" enctype="multipart/form-data">
		<center><p>
			<label>Judul Artikel:</label><br>
			<input type="text" id="judul_artikel" name="judul_artikel" required>
		</p>

		<p>
			<label>Isi Artikel:</label><br>
			<textarea style="width:600px; height:450px" id="isi_artikel" name="isi_artikel" required></textarea>
			
		</p>
	
		<p>
			<label>Penulis Artikel:</label><br>
			<input type="text" id="penulis_artikel" name="penulis_artikel" required>
		</p>
		
		<p>
			<label>Photo Artikel:</label><br>
			<input type="file" id="images" name="images"/>
		</p>
	
		<td colspan=2><input type="submit" id="submit" value="Kirim"></td>
	
</form>

