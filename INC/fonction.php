<?php
    function getage($data,$birth){
        $code="SELECT TIMESTAMPDIFF(YEAR, '$birth', CURDATE()) AS age";
        $resultat = mysqli_query($data, $code);
        $age = mysqli_fetch_assoc($resultat);
        return $age['age'];
    }

    function getResult_Employees($data,$nom,$dept,$age_max,$age_min,$val){
        $code1="SELECT birth_date FROM employees where employees.first_name='$nom'";
        $resultat1 = mysqli_query($data, $code1);

        if (mysqli_num_rows($resultat1) == 0) {
            return false;
        }

        $anniv = mysqli_fetch_assoc($resultat1);
        $age = getage($data,$anniv['birth_date']);

        $code="SELECT * FROM v_dept_deptEmp_Emp where v_dept_deptEmp_Emp.first_name='$nom' and v_dept_deptEmp_Emp.dept_name='$dept' and $age>'$age_min' and $age<'$age_max' LIMIT $val,20";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getResult_NbEmployees($data,$nom,$dept,$age_max,$age_min){
        $code1="SELECT birth_date FROM employees where employees.first_name='$nom'";
        $resultat1 = mysqli_query($data, $code1);

        if (mysqli_num_rows($resultat1) == 0) {
            return false;
        }

        $anniv = mysqli_fetch_assoc($resultat1);
        $age = getage($data,$anniv['birth_date']);

        $code="SELECT count(*) FROM v_dept_deptEmp_Emp where v_dept_deptEmp_Emp.first_name='$nom' and v_dept_deptEmp_Emp.dept_name='$dept' and $age>'$age_min' and $age<'$age_max'";
        $resultat = mysqli_query($data, $code);
        $nb = mysqli_fetch_assoc($resultat);
        return $nb['count(*)'];
    }

    function getNbF($data){
        $code="SELECT * FROM v_NbF";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getNbM($data){
        $code="SELECT * FROM v_NbM";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getSalaireByEmploi($data){
        $code="SELECT * FROM v_SalaryByEmpl";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getCorrectDate($date) {
        $d_date = new DateTime($date);
        $now = new DateTime();
    
        if ($d_date > $now) {
            return $now->format('d-m-Y'); 
        }
    
        return $d_date->format('d-m-Y');
    }

    function getCorrectSalaire($salaire){
        return number_format($salaire, 2, ',', ' ') . ' €';
    }

    function getCorrectNb($nb){
        return number_format($nb, 0, '', ' ');
    }

    function getCorrectGenre($genre){
        if($genre == "F"){
            return "femme";
        }
        if($genre == "M"){
            return "homme";
        }
    }

    function getDept($data,$name_dept){
        $code="SELECT * FROM v_dept_deptEmp  where v_dept_deptEmp.dept_name ='$name_dept'";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getlistDept($data,$name_dept){
        $code="SELECT * FROM departments  where departments.dept_name !='$name_dept'";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getDeptMan($data,$name_dept){
        $code="SELECT * FROM v_dept_deptMan_Emp  where v_dept_deptMan_Emp.dept_name ='$name_dept'";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }
    

?>