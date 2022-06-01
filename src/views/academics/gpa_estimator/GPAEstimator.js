import React from 'react'

const GPAEstimator = () => {
  return (
    <div
      dangerouslySetInnerHTML={{
        __html: `
        <table width="100%" cellspacing="0" cellpadding="0">
        <tbody><tr>
          <td><font size="+1" color="#660000" face="Verdana, Helvetica, Arial, sans-serif"><b>GPA ESTIMATOR</b></font>
          </td><td align="right">
        </td></tr></tbody></table>
        <hr>
        <table align="center" border="2" cellspacing="0" cellpadding="0" width="100%">
        <tbody><tr align="center">
          <td>
          The GPA estimator can be used to estimate your Semester Grade Point Average (GPA). This tool is unofficial and is intended to help with grade planning only. Any grade selection on this tool is not an indication of the eligibility of that grade for the course. Refer to the <a href="http://www.bu.edu/reg/academics/grades-gpa/" target="_blank">Office of the University Registrar</a> for an explanation of grades and GPA calculation.
        </td></tr></tbody></table>
        <br>
        <br>
        <!--
        <TABLE CELLSPACING=0 CELLPADDING=0>
        <TR>
          <TH>Semester:
          <TD>
          <SCRIPT LANGUAGE="JavaScript">
          document.write(fullSemesterName("20223"));
          </SCRIPT>
        </TABLE>
        
        <TABLE ALIGN='center' CELLSPACING=0 CELLPADDING=0>
        <TR>
           <TD><B>Current semester courses and previous semesters' courses with grades</B></TD>
        </TR>
        <TR>
           <TD><B>'X', 'MG', 'I', and 'No grade'.</B></TD>
        </TR>
        </TABLE>
        -->
        <form>
        <script language="JavaScript">
        document.write(assembleTable(currentSemesterCode));
        </script><font size="-1"></font><table align="center" border=""><tbody><tr><th>Course</th><th>Semester</th><th>Credits</th><th>Grade</th><th>Honor Points</th><th>Grade Points</th></tr><tr><td><font size="-1">METCS521</font></td><td><font size="-1">FALL 2021</font></td><td><font size="-1">4.0</font></td><td><font size="-1"><select name="gradesList_0" onchange="update(this.form,gradesList_0)"><option value="No grade" selected="">No grade</option><option value="A">A</option><option value="A-">A-</option><option value="B+">B+</option><option value="B">B</option><option value="B-">B-</option><option value="C+">C+</option><option value="C">C</option><option value="C-">C-</option><option value="CR">CR</option><option value="D">D</option><option value="F">F</option><option value="F*">F*</option><option value="AU">AU</option><option value="I">I</option><option value="J">J</option><option value="MG">MG</option><option value="NC">NC</option><option value="P">P</option><option value="P*">P*</option><option value="W">W</option><option value="I">I</option></select></font></td><td><font size="-1"><input type="text" name="honorPoints_0" value="0" size="10" disabled="" onfocus=""></font></td><td><font size="-1"><input type="text" name="gradePoints_0" value="0.0" size="10" disabled="" onfocus=""></font></td></tr><tr><td><font size="-1">METCS546</font></td><td><font size="-1">FALL 2021</font></td><td><font size="-1">4.0</font></td><td><font size="-1"><select name="gradesList_1" onchange="update(this.form,gradesList_1)"><option value="No grade" selected="">No grade</option><option value="A">A</option><option value="A-">A-</option><option value="B+">B+</option><option value="B">B</option><option value="B-">B-</option><option value="C+">C+</option><option value="C">C</option><option value="C-">C-</option><option value="CR">CR</option><option value="D">D</option><option value="F">F</option><option value="F*">F*</option><option value="AU">AU</option><option value="I">I</option><option value="J">J</option><option value="MG">MG</option><option value="NC">NC</option><option value="P">P</option><option value="P*">P*</option><option value="W">W</option><option value="I">I</option></select></font></td><td><font size="-1"><input type="text" name="honorPoints_1" value="0" size="10" disabled="" onfocus=""></font></td><td><font size="-1"><input type="text" name="gradePoints_1" value="0.0" size="10" disabled="" onfocus=""></font></td></tr><tr><td><font size="-1">METCS601</font></td><td><font size="-1">FALL 2021</font></td><td><font size="-1">4.0</font></td><td><font size="-1"><select name="gradesList_2" onchange="update(this.form,gradesList_2)"><option value="No grade" selected="">No grade</option><option value="A">A</option><option value="A-">A-</option><option value="B+">B+</option><option value="B">B</option><option value="B-">B-</option><option value="C+">C+</option><option value="C">C</option><option value="C-">C-</option><option value="CR">CR</option><option value="D">D</option><option value="F">F</option><option value="F*">F*</option><option value="AU">AU</option><option value="I">I</option><option value="J">J</option><option value="MG">MG</option><option value="NC">NC</option><option value="P">P</option><option value="P*">P*</option><option value="W">W</option><option value="I">I</option></select></font></td><td><font size="-1"><input type="text" name="honorPoints_2" value="0" size="10" disabled="" onfocus=""></font></td><td><font size="-1"><input type="text" name="gradePoints_2" value="0.0" size="10" disabled="" onfocus=""></font></td></tr><tr><td><font size="-1">METCS625</font></td><td><font size="-1">FALL 2021</font></td><td><font size="-1">4.0</font></td><td><font size="-1"><select name="gradesList_3" onchange="update(this.form,gradesList_3)"><option value="No grade" selected="">No grade</option><option value="A">A</option><option value="A-">A-</option><option value="B+">B+</option><option value="B">B</option><option value="B-">B-</option><option value="C+">C+</option><option value="C">C</option><option value="C-">C-</option><option value="CR">CR</option><option value="D">D</option><option value="F">F</option><option value="F*">F*</option><option value="AU">AU</option><option value="I">I</option><option value="J">J</option><option value="MG">MG</option><option value="NC">NC</option><option value="P">P</option><option value="P*">P*</option><option value="W">W</option><option value="I">I</option></select></font></td><td><font size="-1"><input type="text" name="honorPoints_3" value="0" size="10" disabled="" onfocus=""></font></td><td><font size="-1"><input type="text" name="gradePoints_3" value="0.0" size="10" disabled="" onfocus=""></font></td></tr><tr><td><font size="-1">METCS602</font></td><td><font size="-1">SPRING 2022</font></td><td><font size="-1">4.0</font></td><td><font size="-1"><select name="gradesList_4" onchange="update(this.form,gradesList_4)"><option value="No grade" selected="">No grade</option><option value="A">A</option><option value="A-">A-</option><option value="B+">B+</option><option value="B">B</option><option value="B-">B-</option><option value="C+">C+</option><option value="C">C</option><option value="C-">C-</option><option value="CR">CR</option><option value="D">D</option><option value="F">F</option><option value="F*">F*</option><option value="AU">AU</option><option value="I">I</option><option value="J">J</option><option value="MG">MG</option><option value="NC">NC</option><option value="P">P</option><option value="P*">P*</option><option value="W">W</option><option value="I">I</option></select></font></td><td><font size="-1"><input type="text" name="honorPoints_4" value="0" size="10" disabled="" onfocus=""></font></td><td><font size="-1"><input type="text" name="gradePoints_4" value="0.0" size="10" disabled="" onfocus=""></font></td></tr><tr><td><font size="-1">METCS669</font></td><td><font size="-1">SPRING 2022</font></td><td><font size="-1">4.0</font></td><td><font size="-1"><select name="gradesList_5" onchange="update(this.form,gradesList_5)"><option value="No grade" selected="">No grade</option><option value="A">A</option><option value="A-">A-</option><option value="B+">B+</option><option value="B">B</option><option value="B-">B-</option><option value="C+">C+</option><option value="C">C</option><option value="C-">C-</option><option value="CR">CR</option><option value="D">D</option><option value="F">F</option><option value="F*">F*</option><option value="AU">AU</option><option value="I">I</option><option value="J">J</option><option value="MG">MG</option><option value="NC">NC</option><option value="P">P</option><option value="P*">P*</option><option value="W">W</option><option value="I">I</option></select></font></td><td><font size="-1"><input type="text" name="honorPoints_5" value="0" size="10" disabled="" onfocus=""></font></td><td><font size="-1"><input type="text" name="gradePoints_5" value="0.0" size="10" disabled="" onfocus=""></font></td></tr><tr><td><font size="-1">METCS682</font></td><td><font size="-1">SPRING 2022</font></td><td><font size="-1">4.0</font></td><td><font size="-1"><select name="gradesList_6" onchange="update(this.form,gradesList_6)"><option value="No grade" selected="">No grade</option><option value="A">A</option><option value="A-">A-</option><option value="B+">B+</option><option value="B">B</option><option value="B-">B-</option><option value="C+">C+</option><option value="C">C</option><option value="C-">C-</option><option value="CR">CR</option><option value="D">D</option><option value="F">F</option><option value="F*">F*</option><option value="AU">AU</option><option value="I">I</option><option value="J">J</option><option value="MG">MG</option><option value="NC">NC</option><option value="P">P</option><option value="P*">P*</option><option value="W">W</option><option value="I">I</option></select></font></td><td><font size="-1"><input type="text" name="honorPoints_6" value="0" size="10" disabled="" onfocus=""></font></td><td><font size="-1"><input type="text" name="gradePoints_6" value="0.0" size="10" disabled="" onfocus=""></font></td></tr><tr><td><font size="-1">METCS701</font></td><td><font size="-1">SPRING 2022</font></td><td><font size="-1">4.0</font></td><td><font size="-1"><select name="gradesList_7" onchange="update(this.form,gradesList_7)"><option value="No grade" selected="">No grade</option><option value="A">A</option><option value="A-">A-</option><option value="B+">B+</option><option value="B">B</option><option value="B-">B-</option><option value="C+">C+</option><option value="C">C</option><option value="C-">C-</option><option value="CR">CR</option><option value="D">D</option><option value="F">F</option><option value="F*">F*</option><option value="AU">AU</option><option value="I">I</option><option value="J">J</option><option value="MG">MG</option><option value="NC">NC</option><option value="P">P</option><option value="P*">P*</option><option value="W">W</option><option value="I">I</option></select></font></td><td><font size="-1"><input type="text" name="honorPoints_7" value="0" size="10" disabled="" onfocus=""></font></td><td><font size="-1"><input type="text" name="gradePoints_7" value="0.0" size="10" disabled="" onfocus=""></font></td></tr></tbody></table><font size="-1">
        <br>
        <br>
        <table align="center" border="0">
        <tbody><tr><th></th><th>Grade Points</th>
        <th>GPA Based Credits</th>
        <th>Estimated GPI/GPA</th>
        <th>Estimated Earned Credits</th></tr>
        <tr>
          <td><strong>Current Semester<strong></strong></strong></td>
          <td><input type="text" name="currentGradePoints" size="10" disabled="" onfocus=""></td>
          <td><input type="text" name="currentCredits" size="10" disabled="" onfocus=""></td>
          <td><input type="text" name="currentGpa" size="10" disabled="" onfocus=""></td>
          <td><input type="text" name="currentEarnedCredits" size="10" disabled="" onfocus=""></td>
        </tr>
        <tr>
          <td><strong>University(cumulative)</strong></td>
          <td><input type="text" name="totalGradePoints" size="10" disabled="" onfocus=""></td>
          <td><input type="text" name="totalCredits" size="10" disabled="" onfocus=""></td>
          <td><input type="text" name="gpa" size="10" disabled="" onfocus=""></td>
          <td><input type="text" name="totalEarnedCredits" size="10" disabled="" onfocus=""></td>
        </tr>
        </tbody></table>
        <br>
        <br>
        <input type="checkbox" name="showAll" onclick="showTable(this.form)"><strong> Show Previous Semesters</strong>
        
        <div id="prev_sem_expolrer" style="visibility:hidden">
        <layer id="prev_sem_netscape" visibility="hide">
        <h3 align="center"> Previous Semesters</h3>
        <script language="JavaScript">
        document.write(assembleTablePrevious(currentSemesterCode));
        </script><font size="-1"></font><table align="center" border=""><tbody><tr><th>Course</th><th>Semester</th><th>Credits</th><th>Grade</th><th>Honor Points</th><th>Grade Points</th></tr></tbody></table><font size="-1">
        </font></layer><font size="-1">
        </font></div><font size="-1">
        
        
        
        <script id="f5_cspm">(function(){var f5_cspm={f5_p:'KLMBJGAMBPJGFIDOIMEIDPMBDBLJBGPAGIINGJNDPHDJMEPLGKFDKPBHEMJLBLGPLLBBBPFHAANNCALIKLDALDPAAAJCFJDMNCCEMGDJOBFKFEOCMPEONMOENPPPKGGE',setCharAt:function(str,index,chr){if(index>str.length-1)return str;return str.substr(0,index)+chr+str.substr(index+1);},get_byte:function(str,i){var s=(i/16)|0;i=(i&15);s=s*32;return((str.charCodeAt(i+16+s)-65)<<4)|(str.charCodeAt(i+s)-65);},set_byte:function(str,i,b){var s=(i/16)|0;i=(i&15);s=s*32;str=f5_cspm.setCharAt(str,(i+16+s),String.fromCharCode((b>>4)+65));str=f5_cspm.setCharAt(str,(i+s),String.fromCharCode((b&15)+65));return str;},set_latency:function(str,latency){latency=latency&0xffff;str=f5_cspm.set_byte(str,40,(latency>>8));str=f5_cspm.set_byte(str,41,(latency&0xff));str=f5_cspm.set_byte(str,35,2);return str;},wait_perf_data:function(){try{var wp=window.performance.timing;if(wp.loadEventEnd>0){var res=wp.loadEventEnd-wp.navigationStart;if(res<60001){var cookie_val=f5_cspm.set_latency(f5_cspm.f5_p,res);window.document.cookie='f5avr0702934372aaaaaaaaaaaaaaaa_cspm_='+encodeURIComponent(cookie_val)+';path=/';}
        return;}}
        catch(err){return;}
        setTimeout(f5_cspm.wait_perf_data,100);return;},go:function(){var chunk=window.document.cookie.split(/\s*;\s*/);for(var i=0;i<chunk.length;++i){var pair=chunk[i].split(/\s*=\s*/);if(pair[0]=='f5_cspm'&&pair[1]=='1234')
        {var d=new Date();d.setTime(d.getTime()-1000);window.document.cookie='f5_cspm=;expires='+d.toUTCString()+';path=/;';setTimeout(f5_cspm.wait_perf_data,100);}}}}
        f5_cspm.go();}());</script></font></font></form><wordtune-read-extension></wordtune-read-extension>`,
      }}
    />
  )
}

export default GPAEstimator
