<?php
//https://leetcode.com/problems/find-first-and-last-position-of-element-in-sorted-array/description/?envType=problem-list-v2&envId=array
//34. Find First and Last Position of Element in Sorted Array
class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target)
    {
        $pStart = 0;
        $pEnd = count($nums) - 1;
        $arResult = [-1, -1];

        while ($pStart <= $pEnd) {
            // echo "pStart $pStart pEnd $pEnd".PHP_EOL;
            if ($nums[$pStart] == $target) {
                $arResult[0] = $pStart;
            }
            if ($arResult[0] == -1) {
                $pStart++;
            }
            if ($nums[$pEnd] == $target) {
                $arResult[1] = $pEnd;
            }
            if ($arResult[1] == -1) {
                $pEnd--;
            }
            if ($arResult[1] != -1 && $arResult[0] != -1) {
                break;
            }
        }

        return $arResult;
    }
}

$arr = [
    [
        'nums' => [5, 7, 7, 8, 8, 10],
        'target' => 8,
        'output' => [3, 4]
    ],
    [
        'nums' => [5, 7, 7, 8, 8, 10],
        'target' => 6,
        'output' => [-1, -1],
    ],
    [
        'nums' => [1],
        'target' => 1,
        'output' => [0, 0],
    ]
];
foreach ($arr as $arr2) {
    echo '-------------------' . PHP_EOL;
    $result = (new Solution())->searchRange($arr2['nums'], $arr2['target']);
    print_r($arr2);
    print_r($result);
}
