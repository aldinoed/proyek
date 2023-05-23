/**
 * @param {number[]} nums
 * @return {number}
 */
var removeDuplicates = function(nums) {
    let j = 1;
    for(let i = 0; i < nums.length-1; i++){
        while(j < nums.length){
            if(nums[i] == nums[j]){
                nums.splice(j, 1);
                j++;
            }else{
                j++;
            }
        }
    }
};