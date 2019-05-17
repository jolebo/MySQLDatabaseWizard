$(document).ready(function() {
            var count = 0;
 
            $("#add_btn").click(function(){
                    count += 1;
                $('#container').append(
                             '<tr class="records">'
                         + '<td><input id="nama[]" name="nama[]" type="text" class="form-control"></td>'
                         + '<td><select id="type[]" name="type[]" class="form-control"><option value="INT">INT</option><option value="VARCHAR">VARCHAR</option><option value="TEXT">TEXT</option><option value="DATE">DATE</option><option value="ENUM">ENUM</option><option value="DECIMAL">DECIMAL</option><option value="FLOAT"> FLOAT</option><option value="DOUBLE">DOUBLE</option></select></td>'
                         + '<td><input id="length[]" name="length[]" type="text" class="form-control"></td>'
                         + '<td><input id="null[]" name="null[]" type="checkbox" value="NULL" class="form-control"></td>'
                         + '<td><select id="index[]" name="index[]" class="form-control"><option></option><option value="PRIMARY KEY">PRIMARY</option><option value="UNIQUE KEY">UNIQUE</option><option value="TEXT">TEXT</option><option value="DATE">DATE</option><option value="INDEX KEY">INDEX</option><option value="FULLTEXT KEY">FULLTEXT</option><option value="SPATIAL KEY"> SPATIAL</option></select></td>'
                         + '<td><input id="ai[]" name="ai[]" type="checkbox" value="AUTO_INCREMENT" class="form-control"></td>'
                    );
                });
        });