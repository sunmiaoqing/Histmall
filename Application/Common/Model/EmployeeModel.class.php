<?php
// +----------------------------------------------------------------------
// | 自定义员工模型
// +----------------------------------------------------------------------
namespace Common\Model;
use Think\Model;

class EmployeeModel extends Model
{

    // 获取所有用户
    public function randomEmployee()
    {
        $employees = $this->where(array('weight' => array('gt', 0)))->select();
        $sum = $this->where(array('weight' => array('gt', 0)))->sum('weight');
        if (!$employees) {
            return 0;
        }
        $result = 0;
        $total = 100;
        $random = mt_rand(1, 100);
        if ($random > $sum) {
            return $result;
        }
        $random = $sum - $random;
        foreach ($employees as $v) {
            if ($random > $v['weight']) {
                $random = $random - $v['weight'];
            } else {
                $result = $v['id'];
                break;
            }
        }
        return $result;
    }

}

?>
