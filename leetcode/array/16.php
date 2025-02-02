<?php
#https://leetcode.com/problems/3sum-closest/description/?envType=problem-list-v2&envId=array
#16. 3Sum Closest

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target)
    {
        $min = 10000;
        $result = 0;
        $n = count($nums);
        if ($n == 3) {
            return $nums[0] + $nums[1] + $nums[2];
        }
        sort($nums);
        for ($i = 0; $i < $n - 2; $i++) {
            $j = $i + 1;
            $k = $n - 1;
            while ($j < $k) {
                $s = $nums[$i] + $nums[$j] + $nums[$k];
                if ($s == $target) {
                    return $s;
                }
                $r = abs($s - $target);
                //  echo "$nums[$i] + $nums[$j] + $nums[$k] = $s  r = $r result=$result min=$min" . PHP_EOL;
                if ($r < $min) {
                    $min = $r;
                    $result = $s;
                }

                if ($s < $target) {
                    $j++;
                }
                if ($s > $target) {
                    $k--;
                }
            }
        }

        return $result;
    }
}

$arr = [
    [
        'nums' => [-1, 2, 1, -4],
        'target' => 1,
        'output' => 2,
    ],
    [
        'nums' => [4, 0, 5, -5, 3, 3, 0, -4, -5],
        'target' => -2,
        'output' => -2,
    ],
];
foreach ($arr as $arr2) {
    echo PHP_EOL . '-------------------' . PHP_EOL;
    $result = (new Solution())->threeSumClosest($arr2['nums'], $arr2['target']);
    print_r($arr2);
    echo "result: {$result}" . PHP_EOL;
}
