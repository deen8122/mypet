<?php
//https://leetcode.com/problems/4sum/description/?envType=problem-list-v2&envId=array
//18. 4Sum

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    function fourSum($nums, $target)
    {
        $result = [];
        $n = count($nums);
        if ($n == 4 && ($target == ($nums[0] + $nums[1] + $nums[2] + $nums[3]))) {
            return [[$nums[0], $nums[1], $nums[2] ,$nums[3]]];
        }
        sort($nums);
        $l = $n-1 ;
       // echo implode(", ",$nums).PHP_EOL;
        for ($i = 0; $i < $n - 2; $i++) {
            //$j = $i + 1;
            $l = $n-1 - $i;
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) {
                continue;
            }
            while ($i < $l) {

                $j = $i + 1;
                $k = $l - 1;

                while ($j < $k) {
                    if ( $nums[$j] == $nums[$j + 1]) {
                        $j++;
                        continue;
                    }
                    if ( $nums[$k] == $nums[$k - 1]) {
                        $k--;
                        continue;
                    }
                    $s = $nums[$i] + $nums[$j] + $nums[$k] + $nums[$l];
                  //  echo "$nums[$i] + $nums[$j] + $nums[$k]  + $nums[$l] = $s " . PHP_EOL;
                    if ($s == $target) {
                        $result[] = [$nums[$i], $nums[$j], $nums[$k], $nums[$l]];
                        $j++;
                        $k--;
                        // $k = $l-1;
                        continue;
                    }
                    if ($s < $target) {
                        $j++;
                    }
                    if ($s > $target) {
                        // $l--;
                        // $k = $l-1;
                        $k--;
                    }
                }
               // echo ' end ';
                if ($nums[$l] == $nums[$l - 1]) {
                    $l-=2;
                    continue;
                }
                $l--;
            }
        }

        return $result;
    }

}

$arr = [
//    [
//        'nums' => [1,0,-1,0,-2,2],
//        'target' => 0,
//        'output' => [[-2,-1,1,2],[-2,0,0,2],[-1,0,0,1]],
//    ],
//    [
//        'nums' => [-3,-1,0,2,4,5],
//        'target' => 0,
//        'output' => [[-3,-1,0,4]],
//    ],
        [
            'nums' => [-2,-1,-1,1,1,2,2],
            'target' => 0,
            'output' =>[[-2,-1,1,2],[-1,-1,1,1]],
        ],
];
foreach ($arr as $arr2) {
    echo PHP_EOL . '-------------------' . PHP_EOL;
    $result = (new Solution())->fourSum($arr2['nums'], $arr2['target']);
    print_r($arr2);
    print_r($result);
   // echo "result: ".implode(", ",$result)." ". PHP_EOL;
}