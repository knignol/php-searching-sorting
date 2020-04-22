<?php

/**
 * Performs a linear search on the given array, searching for the given key
 * Worst case running time O(N)
 * @param $array the array to be searched
 * @param $key the element being searched for
 * @return the index of the key, or -1 if the array does not contain the key
 */
function linear_search($array, $key)
{
    if (count($array) == 0) {
        return -1;
    }

    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $key) {
            return $i;
        }
    }

    return -1;
}

/**
 * Performs a binary search on the given array, searching for the given key
 * Worst case running time O(log2(N))
 * @param $array the array to be searched
 * @param $key the element being searched for
 * @return the index of the key, or -1 if the array does not contain the key
 */
function binary_search($array, $key)
{
    if (count($array) == 0) {
        return -1;
    }

    $low = 0;
    $high = count($array) - 1;

    while ($low <= $high) {
        $mid = floor(($low + $high) / 2);

        if ($array[$mid] == $key) {
            return $mid;
        }

        if ($key < $array[$mid]) {
            $high = $mid - 1;
        }

        if ($key > $array[$mid]) {
            $low = $mid + 1;
        }
    }

    return -1;
}

/**
 * Performs a selection sort on the given array
 * Worst case running time O(N^2)
 * @param $array the array to be sorted by selection sort
 * @return $array the sorted array
 */
function selection_sort($array)
{   
    if(count($array) <= 1){
        return $array;
    }
    for($i = 0; $i < count($array); $i++){
        $indexSmallest = $i;
        for($j = $i + 1; $j < count($array); $j++){
            if($array[$j] < $array[$indexSmallest]){
                $indexSmallest = $j;
            }
        }
        $temp = $array[$i];
        $array[$i] = $array[$indexSmallest];
        $array[$indexSmallest] = $temp;
    }
    return $array;
}

/**
 * Performs am insertion sort on the given array
 * Worst case running time O(N^2)
 * @param $array the array to be sorted by insertion sort
 * @return $array the sorted array
 */
function insertion_sort($array)
{
    if(count($array) <= 1){
        return $array;
    }
    for($i = 1; $i < count($array); $i++){
        $j = $i;
        while($j > 0 && $array[$j] < $array[$j - 1]){
            $temp = $array[$j];
            $array[$j] = $array[$j - 1];
            $array[$j - 1] = $temp;
            $j--;
        }
    }
    return $array;
}

/**
 * Client-entry point for a merge sort
 * Recursively sorts the given array using merge sort
 * Worst case running time O(N*log(N))
 * @param $array the array to be sorted by merge sort
 */
function merge_sort($array){
    if(count($array) == 1){
        return $array;
    }
    
    $mid = floor(count($array) / 2);
    $left = array_slice($array, 0, $mid);
    $right = array_slice($array, $mid);
    $left = merge_sort($left);
    $right = merge_sort($right);
    
    return merge($left, $right);
}

/**
 * Merges the two given sub arrays $left and $right
 * @param $left the left half of the original array 
 * @param $right the right half of the original array
 * @return $result the sorted array
 */
function merge($left, $right){
    $result = array();
    
    while(count($left) > 0 && count($right) >0){
        if($left[0] > $right[0]){
            $result[] = $right[0];
            $right = array_slice($right, 1);
        }
        else{
            $result[] = $left[0];
            $left = array_slice($left, 1);
        }
    }
    
    while(count($left) > 0){
        $result[] = $left[0];
        $left = array_slice($left, 1);
    }
    
    while(count($right) > 0){
        $result[] = $right[0];
        $right = array_slice($right, 1);
    }
    
    return $result;
}

?>
